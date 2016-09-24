<?php

namespace CodeDelivery\Http\Controllers\Admin;

use CodeDelivery\Repositories\CategoryRepository;
use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\UserRepository;
use Illuminate\Routing\Controller;

class DashboardController extends Controller
{
    /**
     * @var UserRepository
     */
    private $repository;
    /**
     * @var CategoryRepository
     */
    private $categoryRepository;
    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(OrderRepository $repository, UserRepository $userRepository, CategoryRepository $categoryRepository)
    {
        $this->repository = $repository;
        $this->categoryRepository = $categoryRepository;
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $titulo = "Área Administrativa";

        $subtitulo = "Página Principal";

        $orders = $this->repository->scopeQuery(function($q){
            return $q->orderBy('id', 'desc');
        })->paginate(10);

        $clients = $this->userRepository->scopeQuery(function($q){
            return $q->where(['role' => 'client'])->orderBy('id', 'desc');
        })->paginate(10);

        $categories = $this->categoryRepository->scopeQuery(function($q){
            return $q->orderBy('id', 'desc');
        })->paginate(10);

        return view('admin.dashboard.index', compact('titulo', 'subtitulo', 'orders', 'clients', 'categories'));
    }
}
