<?php

namespace CodeDelivery\Http\Controllers\Api\Client;

use CodeDelivery\Http\Controllers\Controller;
use CodeDelivery\Http\Requests\AdminEstabelecimentoRequest;
use CodeDelivery\Models\Avaliacao;
use CodeDelivery\Repositories\AvaliacaoRepository;
use CodeDelivery\Repositories\EstabelecimentoCategoriaRepository;
use CodeDelivery\Repositories\EstabelecimentoRepository;
use CodeDelivery\Repositories\ProductRepository;
use CodeDelivery\Services\AvaliacoesService;
use CodeDelivery\Services\EstabelecimentoService;
use CodeDelivery\Services\GeoService;
use Illuminate\Http\Request;
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
    /**
     * @var Avaliacao
     */
    private $avaliacaoRepository;
    /**
     * @var GeoService
     */
    private $geoService;
    /**
     * @var EstabelecimentoCategoriaRepository
     */
    private $estabelecimentoCategoriaRepository;

    /**
     * ClientEstabelecimentoController constructor.
     * @param EstabelecimentoRepository $repository
     * @param ProductRepository $productRepository
     * @param AvaliacoesService $service
     * @param EstabelecimentoService $estabelecimentoService
     * @param AvaliacaoRepository $avaliacaoRepository
     * @param GeoService $geoService
     */
    public function __construct(EstabelecimentoRepository $repository,
                                ProductRepository $productRepository,
                                AvaliacoesService $service,
                                EstabelecimentoService $estabelecimentoService,
                                AvaliacaoRepository $avaliacaoRepository,
                                GeoService  $geoService,
                                EstabelecimentoCategoriaRepository $estabelecimentoCategoriaRepository
    )
    {
        $this->repository = $repository;
        $this->productRepository = $productRepository;
        $this->service = $service;
        $this->estabelecimentoService = $estabelecimentoService;
        $this->avaliacaoRepository = $avaliacaoRepository;
        $this->geoService = $geoService;
        $this->estabelecimentoCategoriaRepository = $estabelecimentoCategoriaRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $idCidade = $request->get('cidade');
        $idCategory = $request->get('category');
        return $this->repository
            ->skipPresenter(false)
            ->findWhere([
                'cidade_id'=>(int)$idCidade,
                'estabelecimento_categoria_id'=>(int)$idCategory,
            ]);
    }

    public function show($id)
    {
        return $this->repository->skipPresenter(false)->find($id);
    }

    public function categoriasEstabelecimentos(){
        return $this->estabelecimentoCategoriaRepository
            ->skipPresenter(false)
            ->all();
    }


    public function questoes(){
      return $this->avaliacaoRepository->skipPresenter(false)->scopeQuery(function ($query) {
          return $query->where('status', '=', 1);
      })->all();
    }

    public function returnCategoriesAndProductsByEstabelecimento($id)
    {
        return response()->json($this->estabelecimentoService->returnCategoriesByEstabelecimento($id));
    }

    public function returnAvaliacoesByEstabelecimento($id)
    {
        return response()->json($this->service->returnAvaliacoesByEstabelecimento($id));
    }

    public function returnItemsAvaliadosByOrder($id)
    {
        return response()->json($this->service->returnItemsAvaliadosByOrder($id));
    }

    public function returnAvaliacoesItemsByEstabelecimento($id)
    {
        return response()->json($this->service->returnItemsAvaliadosByEstabelecimento($id));
    }
}
