<?php

namespace CodeDelivery\Http\Controllers\Api\Deliveryman;

use CodeDelivery\Events\GetLocationDeliveryman;
use CodeDelivery\Models\Geo;
use CodeDelivery\Repositories\CategoryRepository;
use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\ProductRepository;
use CodeDelivery\Repositories\UserRepository;
use CodeDelivery\Services\OrderService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

use CodeDelivery\Http\Requests\AdminCategoryRequest;
use CodeDelivery\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;

class DeliverymanCheckoutController extends Controller
{
    private $repository;
    /**
     * @var ProductRepository
     */
    private $productRepository;
    /**
     * @var OrderService
     */
    private $service;

    private $with = ['client', 'cupom', 'items'];

    public function __construct(
        OrderRepository $repository,
        UserRepository $userRepository,
        OrderService $service
    )
    {
        $this->repository = $repository;
        $this->userRepository = $userRepository;
        $this->service = $service;

    }

    public function index()
    {
        $idDeliveryman = Authorizer::getResourceOwnerId();
        $orders = $this->repository
            ->skipPresenter(false)->scopeQuery(function ($query) use ($idDeliveryman) {
                return $query->where('user_deliveryman_id', '=', $idDeliveryman);
            })->paginate();
        return $orders;
    }

    public function create()
    {
        $products = $this->productRepository->getLista();
        return view('costumer.order.create', compact('products'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $idDeliveryman = Authorizer::getResourceOwnerId();
        $clientId = $this->userRepository->find($idDeliveryman)->client->id;
        $data['client_id'] = $clientId;
        $o = $this->service->create($data);
        $order = $this->repository
            ->skipPresenter(false)
            ->with($this->with)->find($o->id);
        return $order;
    }

    public function updateStatus(Request $request, $id)
    {
        $idDeliveryman = Authorizer::getResourceOwnerId();
        return $this->service->updateStatus($id, $idDeliveryman, $request->get('status'));
    }

    public function show($id)
    {

        $idDeliveryman = Authorizer::getResourceOwnerId();

        return  $this->service->show($id);
    }

    public function geo(Request $request, Geo $geo, $id)
    {

        $idDeliveryman = Authorizer::getResourceOwnerId();
        $order = $this->repository->getByIdAndDeliveryman($id, $idDeliveryman);
        if (!$order)
            throw ModelNotFoundException::class;
        $geo->lat = $request->get('lat');
        $geo->long = $request->get('long');
        event(new GetLocationDeliveryman($geo, $order));
        return $geo;
    }


}
