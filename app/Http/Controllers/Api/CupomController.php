<?php

namespace CodeDelivery\Http\Controllers\Api;

use CodeDelivery\Http\Controllers\Controller;
use CodeDelivery\Repositories\CupomRepository;

class CupomController extends Controller
{
    private $repository;

    public function __construct(
        CupomRepository $repository
    )
    {
        $this->repository = $repository;

    }

    public function show($id){
        $products = $this->repository->skipPresenter(false)->findByCode($id);
        return $products;
    }

}
