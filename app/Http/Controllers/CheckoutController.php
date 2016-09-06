<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Http\Requests\CheckoutRequest;
use CodeDelivery\Repositories\CategoryRepository;
use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\ProductRepository;
use CodeDelivery\Repositories\UserRepository;
use CodeDelivery\Services\OrderService;
use Illuminate\Http\Request;

use CodeDelivery\Http\Requests\AdminCategoryRequest;
use CodeDelivery\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
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

    public function __construct(
        OrderRepository $repository,
        ProductRepository $productRepository,
        UserRepository $userRepository,
        OrderService $service
    )
    {
        $this->repository = $repository;
        $this->productRepository = $productRepository;
        $this->userRepository = $userRepository;
        $this->service = $service;
    }

    public function index()
    {
        $clientId = $this->userRepository->find(Auth::user()->id)->client->id;
        $orders = $this->repository->scopeQuery(function ($query) use ($clientId) {
            return $query->where('client_id', '=', $clientId);
        })->paginate();
        return view('costumer.order.index', compact('orders'));
    }

    public function create()
    {
        $products = $this->productRepository->getLista();
        return view('costumer.order.create', compact('products'));
    }

    public function store(CheckoutRequest $request)
    {
        $data = $request->all();
        $clientId = $this->userRepository->find(Auth::user()->id)->client->id;
        $data['client_id'] = $clientId;
        $this->service->create($data);
        return redirect()->route('costumer.order.index');
    }
}
