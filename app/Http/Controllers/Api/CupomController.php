<?php

namespace CodeDelivery\Http\Controllers\Api;

use CodeDelivery\Http\Controllers\Controller;
use CodeDelivery\Repositories\CupomRepository;
use Illuminate\Support\Facades\DB;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;

class CupomController extends Controller
{
    private $repository;

    public function __construct(
        CupomRepository $repository
    )
    {
        $this->repository = $repository;
    }

    public function show($id)
    {
        $products = $this->repository->skipPresenter(false)->findByCode($id);
        return $products;
    }

    public function utilizados()
    {
        $id = Authorizer::getResourceOwnerId();

        $list = DB::table('cupoms')
            ->join('user_cupoms', 'cupoms.id', '=', 'user_cupoms.cupom_id')
            ->select('cupoms.*')
            ->where('user_cupoms.user_id', $id)
            ->get();

        return ['data' => $list];
    }

}
