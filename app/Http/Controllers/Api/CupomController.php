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
            ->distinct()
            ->join('user_cupoms', 'cupoms.id', '=', 'user_cupoms.cupom_id')
            ->join('orders', 'user_cupoms.user_id', '=', 'orders.client_id')
            ->select('orders.id', 'cupoms.code', 'orders.created_at')
            ->where('user_cupoms.user_id', $id)
            ->where('orders.cupom_id', '<>', '')
            ->get();

        return ['data' =>$list];
    }

}
