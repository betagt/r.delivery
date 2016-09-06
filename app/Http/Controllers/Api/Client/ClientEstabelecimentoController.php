<?php

namespace CodeDelivery\Http\Controllers\Api\Client;

use CodeDelivery\Http\Controllers\Controller;
use CodeDelivery\Repositories\EstabelecimentoRepository;
use CodeDelivery\Repositories\ProductRepository;
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

    public function __construct(EstabelecimentoRepository $repository, ProductRepository $productRepository)
    {
        $this->repository = $repository;
        $this->productRepository = $productRepository;
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
        $data = DB::table('categories')
            ->join('products', 'categories.id', '=', 'products.category_id')
            ->join('estabelecimentos', 'estabelecimentos.id', '=', 'products.estabelecimento_id')
            ->select('categories.*')
            ->where('estabelecimentos.id', $id)
            ->groupBy('categories.id')
            ->get()
        ;

        if (!$data)
        {
            return null;
        }

        $result = [];
        foreach ($data as $value)
        {
            $value->products = $this->productRepository->skipPresenter('false')->findWhere(['category_id' => $value->id]);
            $result[] = $value;
        }
        return response()->json(['data' => $result ]);
    }
}
