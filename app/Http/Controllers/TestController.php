<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Repositories\CategoryRepository;
use CodeDelivery\Repositories\ProductRepository;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    /**
     * @var CategoryRepository
     */
    private $repository;

    /**
     * TestController constructor.
     */
    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        return 'teste';
    }
}
