<?php

namespace CodeDelivery\Services;

use CodeDelivery\Repositories\CategoryRepository;
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
    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function returnCategoriesByEstabelecimento($id)
    {
        return $this->repository->skipPresenter(false)->findWhere(['estabelecimento_id' => $id, 'parent_id' => 0]);
    }
}