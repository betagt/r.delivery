<?php

namespace CodeDelivery\Http\Controllers\Api\Client;

use CodeDelivery\Http\Requests\AdminOrderAvaliacaoRequest;
use CodeDelivery\Http\Requests\AdminUserRequest;
use CodeDelivery\Http\Requests\CheckoutContatoRequest;
use CodeDelivery\Http\Requests\CheckoutRequest;
use CodeDelivery\Repositories\ContatoRepository;
use CodeDelivery\Repositories\OrderAvaliacaoRepository;
use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\ProductRepository;
use CodeDelivery\Repositories\UserAddressRepository;
use CodeDelivery\Repositories\UserRepository;
use CodeDelivery\Services\AvaliacoesService;
use CodeDelivery\Services\OrderService;
use CodeDelivery\Http\Controllers\Controller;
use Illuminate\Http\Request;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;

class ClientCheckoutController extends Controller
{
    private $repository;
    /**
     * @var ProductRepository
     */
    private $productRepository;
    /**
     * @var UserRepository
     */
    private $userRepository;
    /**
     * @var OrderService
     */
    private $service;

    private $with = ['client', 'cupom', 'items'];
    /**
     * @var OrderAvaliacaoRepository
     */
    private $orderAvalicaoRepository;
    /**
     * @var UserAddressRepository
     */
    private $userAddressRepository;
    /**
     * @var ContatoRepository
     */
    private $contatoRepository;
    /**
     * @var AvaliacoesService
     */
    private $avaliacoesService;

    public function __construct(
        OrderRepository $repository,
        ProductRepository $productRepository,
        UserRepository $userRepository,
        OrderAvaliacaoRepository $orderAvalicaoRepository,
        OrderService $service,
        ContatoRepository $contatoRepository,
        AvaliacoesService $avaliacoesService
    )
    {
        $this->repository = $repository;
        $this->productRepository = $productRepository;
        $this->userRepository = $userRepository;
        $this->orderAvalicaoRepository = $orderAvalicaoRepository;
        $this->service = $service;
        $this->contatoRepository = $contatoRepository;
        $this->avaliacoesService = $avaliacoesService;
    }

    /**
     * Listagem de Pedidos
     *
     * Sendo todos os pedidos listados de acordo com o cliente logado no aplicativo
     *
     * @return array
     */
    public function index()
    {
        $id = Authorizer::getResourceOwnerId();
        $orders = $this->repository
            ->skipPresenter(false)
            ->with($this->with)->scopeQuery(function ($query) use ($id) {
                return $query->where('client_id', '=', $id);
            })->paginate();

        return $orders;
    }

//    public function create()
//    {
//        $products = $this->productRepository->getLista();
//        return view('costumer.order.create', compact('products'));
//    }


    /**
     * Cadastro de Pedido
     *
     * Considerando o Produto
     *
     * @return array
     */
    public function store(CheckoutRequest $request)
    {
        $data = $request->all();
//        $id = Authorizer::getResourceOwnerId();
//        $clientId = $this->userRepository->find($id)->client->id;
//        $data['client_id'] = $clientId;
        $data['client_id'] = Authorizer::getResourceOwnerId();
        $o = $this->service->create($data);
        return $this->repository->skipPresenter(false)->with($this->with)->find($o->id);
    }



    public function storeAvaliacao(AdminOrderAvaliacaoRequest $request, $id)
    {
        return $this->avaliacoesService->store($request, $id);
    }

    public function paymentConfirmation(Request $request){
        $idOrder = intval($request->get('order'));
        $nome = $request->get('nome');
        $cpf = $request->get('cpf');
        $id = Authorizer::getResourceOwnerId();
        $order = $this->repository->findWhere([
            'id'=>$idOrder,
            'client_id'=>$id
        ])->first();

        if(!$order){
            abort(300,'Erro ao realizar pagamento');
        }

        $user = $this->userRepository->find($id);
        $method = $request->get('method');
        $currency = 'BRL';
        $hash = $request->get('hash');
        $tipoEntrega = 'NOT_SPECIFIED';
        $total = 0;
        $token = $request->get('token');
        $items = $order->items;
        $address = $order->deliveryAddresses->first();

        $directPaymentRequest = new \PagSeguroDirectPaymentRequest();
        $directPaymentRequest->setPaymentMode('DEFAULT'); //Gateway
        $directPaymentRequest->setPaymentMethod($method);

        $directPaymentRequest->setCurrency($currency);

        foreach ($items as $key=>$item){
           if($item->product_extra_id == 0){
               $total += $item->price;
               $directPaymentRequest->addItem("00".$item->id,$item->product->name,$item->qtd,$item->price);
           }
        }

        $directPaymentRequest->addItem("5000",'taxa de entrega',1,$order->taxa_entrega);

        $directPaymentRequest->setSender(
            $nome,
            $user->email,
            $user->ddd_celular,
            $user->telefone_celular,
            'CPF',
            $cpf
        );
        /*
         $directPaymentRequest->setSender(
            $user->name,
            'c39797427091303561162@sandbox.pagseguro.com.br',
            '63',
            '56273440',
            'CPF',
            '156.009.442-76'
        );
         * */

        $directPaymentRequest->setSenderHash($hash);
        $installments = new \PagSeguroDirectPaymentInstallment([
            'quantity'=>1,
            'value'=>floatval($total+$order->taxa_entrega)
        ]);

        $sedexCode = \PagSeguroShippingType::getCodeByType($tipoEntrega);
        $directPaymentRequest->setShippingType($sedexCode);
       $directPaymentRequest->setShippingAddress(
           $address->zipcode,
           $address->address,
           $address->number,
           $address->complement,
           $address->neighborhood,
           $address->city,
           $address->state,
            'BRA'
        );
        $creditCardToken = $token;

        $billingAddress = new \PagSeguroBilling(
            array(
                'postalCode' => $address->zipcode,
                'street' => $address->address,
                'number' => $address->number,
                'complement' => $address->complement,
                'district' => $address->neighborhood,
                'city' =>  $address->city,
                'state' => $address->state,
                'country' => 'BRA'
            )
        );

        $creditCardData = new \PagSeguroCreditCardCheckout(
            array(
                'token' => $creditCardToken,
                'installment' => $installments,
                'billing' => $billingAddress,
                'holder' => new \PagSeguroCreditCardHolder(
                    array(
                        'name' =>  $user->name,
                        'birthDate' => date_format(date_create($user->data_nascimento),"d/m/Y"),
                        'areaCode' => $user->ddd_celular,
                        'number' => $user->telefone_celular,
                        'documents' => array(
                            'type' => 'CPF',
                            'value' =>  $user->cpf
                        )
                    )
                )
            )
        );

        $directPaymentRequest->setCreditCard($creditCardData);
        if (!$order->hash) {
            $order->hash = md5((new \DateTime())->getTimestamp());
        }
        $order->save();
        try {
            $credentials = \PagSeguroConfig::getAccountCredentials(); // getApplicationCredentials()
            $response = $directPaymentRequest->register($credentials);
            return [
                'message' => 'Pagamento realizado com sucesso aguarde a liberação do pedido!',
                'success'=>true
            ];
        } catch (\PagSeguroServiceException $e) {
            abort(300, 'Erro ao realizar o pagamento');
        }
    }

    public function storeContato(CheckoutContatoRequest $request)
    {
        $data = $request->all();

        $data['user_id'] = Authorizer::getResourceOwnerId();

        $entity = $this->contatoRepository->create($data);

        return response()->json([ 'mensagem' => $entity->id ]);
    }

    public function show($id)
    {
        $idUser= Authorizer::getResourceOwnerId();
        return  $this->repository
            ->skipPresenter(false)
            ->getByIdAndClient($id,$idUser);
    }
}
