<?php

namespace CodeDelivery\Http\Controllers\Api\Client;

use CodeDelivery\Http\Controllers\Controller;
use CodeDelivery\Repositories\EstabelecimentoRepository;
use CodeDelivery\Repositories\ProductRepository;
use CodeDelivery\Services\AvaliacoesService;
use CodeDelivery\Services\EstabelecimentoService;
use Illuminate\Support\Facades\DB;

class ClientEstabelecimentoController extends Controller
{
    /**
     * @var EstabelecimentoRepository
     */
    private $repository;
    /**
     * @var ProductRepository
     */
    private $productRepository;
    /**
     * @var AvaliacoesService
     */
    private $service;
    /**
     * @var EstabelecimentoService
     */
    private $estabelecimentoService;

    public function __construct(EstabelecimentoRepository $repository,
                                ProductRepository $productRepository,
                                AvaliacoesService $service,
                                EstabelecimentoService $estabelecimentoService
    )
    {
        $this->repository = $repository;
        $this->productRepository = $productRepository;
        $this->service = $service;
        $this->estabelecimentoService = $estabelecimentoService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->repository
            ->skipPresenter(false)
            ->all();
    }

    public function show($id)
    {
        return $this->repository->skipPresenter(false)->find($id);
    }

    public function returnCategoriesAndProductsByEstabelecimento($id)
    {
        return response()->json($this->estabelecimentoService->returnCategoriesByEstabelecimento($id));
    }

    public function returnAvaliacoesByEstabelecimento($id)
    {
        return response()->json($this->service->returnAvaliacoesByEstabelecimento($id));
    }
}
