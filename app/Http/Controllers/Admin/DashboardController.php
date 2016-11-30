<?php

namespace CodeDelivery\Http\Controllers\Admin;

use CodeDelivery\Http\Requests\Request;
use CodeDelivery\Repositories\CategoryRepository;
use CodeDelivery\Repositories\EstabelecimentoRepository;
use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\UserRepository;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class DashboardController extends Controller
{
    /**
     * @var UserRepository
     */
    private $repository;
    /**
     * @var UserRepository
     */
    private $userRepository;
    /**
     * @var EstabelecimentoRepository
     */
    private $estabelecimentoRepository;

    public function __construct(OrderRepository $repository, UserRepository $userRepository, EstabelecimentoRepository $estabelecimentoRepository)
    {
        $this->repository = $repository;
        $this->userRepository = $userRepository;
        $this->estabelecimentoRepository = $estabelecimentoRepository;
    }

    public function index()
    {
        if (auth()->user()->role == 'admin') {
            $titulo = "Área Administrativa";

            $subtitulo = "Página Principal";

            $orders = $this->repository->scopeQuery(function ($q) {
                return $q->orderBy('id', 'desc');
            })->paginate(10);

            $clients = $this->userRepository->scopeQuery(function ($q) {
                return $q->where(['role' => 'client'])->orderBy('id', 'desc');
            })->paginate(10);

            $estabelecimentos = $this->estabelecimentoRepository->scopeQuery(function ($q) {
                return $q->orderBy('id', 'desc');
            })->paginate(10);

            return view('admin.dashboard.index', compact('titulo', 'subtitulo', 'orders', 'clients', 'estabelecimentos'));
        }
        if (auth()->user()->role == 'estabelecimento') {
            $id = auth()->user()->id;

            $titulo = "Ambiente do Estabelecimento";

            $subtitulo = "Listagem de Pedidos";

            $orders = $this->repository->scopeQuery(function ($q) use ($id) {
                $q->where(['estabelecimento_id' => $id]);
                return $q->orderBy('id', 'desc');
            })->paginate(10);

            setcookie("reference", base64_encode($id));

            return view('admin.dashboard.index', compact('titulo', 'subtitulo', 'orders'));;
        }

    }
}
