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
            })->all();

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

    public function storeContato(CheckoutContatoRequest $request)
    {
        $data = $request->all();

        $data['user_id'] = Authorizer::getResourceOwnerId();

        $entity = $this->contatoRepository->create($data);

        return response()->json([ 'mensagem' => $entity->id ]);
    }

    public function show($id)
    {
        return $this->service->show($id);
    }
}
