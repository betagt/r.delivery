<?php

namespace CodeDelivery\Http\Controllers\Admin;

use CodeDelivery\Repositories\EstabelecimentoRepository;
use Illuminate\Routing\Controller;

class EstabelecimentosController extends Controller
{
    public function __construct(EstabelecimentoRepository $repository)
    {
        $this->repository = $repository;

        $this->titulo = 'Estabelecimentos';

        $this->route = 'admin.estabelecimentos';
    }

    public function index()
    {
        $titulo = $this->titulo;

        $subtitulo = "Gerenciar Estabelecimentos";

        return view('admin.estabelecimentos.index', compact('titulo', 'subtitulo'));
    }

    public function listar()
    {
        return $this->repository->skipPresenter(false)->all();
    }
}