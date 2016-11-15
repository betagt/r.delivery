<?php

namespace CodeDelivery\Http\Controllers\Ajax;

use CodeDelivery\Repositories\EstabelecimentoRepository;

use CodeDelivery\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EstabelecimentosController extends Controller
{
    /**
     * @var EstabelecimentoRepository
     */
    private $repository;

    public function __construct(EstabelecimentoRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->repository->skipPresenter(false)->paginate(3);
    }
}
