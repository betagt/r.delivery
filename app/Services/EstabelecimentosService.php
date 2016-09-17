<?php

namespace CodeDelivery\Services;

use CodeDelivery\Repositories\ProductRepository;
use Illuminate\Support\Facades\DB;

class EstabelecimentoService
{
    /**
     * @var ProductRepository
     */
    private $repository;

    /**
     * EstabelecimentoService constructor.
     */
    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function returnCategoriesByEstabelecimento($id)
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
            $value->products = [
                'data' => $this->repository->skipPresenter('false')->findWhere(['category_id' => $value->id])
            ];
            $result[] = $value;
        }
        return ['data' => $result ];
    }
}