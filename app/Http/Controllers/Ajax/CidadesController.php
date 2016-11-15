<?php

namespace CodeDelivery\Http\Controllers\Ajax;

use CodeDelivery\Repositories\CidadeRepository;

use CodeDelivery\Http\Controllers\Controller;

class CidadesController extends Controller
{
    /**
     * @var CidadeRepository
     */
    private $repository;

    public function __construct(CidadeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        return $this->repository->scopeQuery(function($q) {
            return $q->orderBy('nome', 'ASC');
        })->skipPresenter(false)->all();
    }
}
