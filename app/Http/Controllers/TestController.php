<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Models\User;
use CodeDelivery\Repositories\AvaliacaoRepository;
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
    public function __construct(AvaliacaoRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        return $this->getAvaliacoes(11);
    }

    private function getAvaliacoes($idEstabelecimento)
    {
        $avaliacoes = $this->repository->findWhere(['status' => 1])->all();

        $result = [];
        foreach ($avaliacoes as $item) {
            $result[] = [
                'nota' => $this->getMedia($idEstabelecimento, $item->id),
                'questao' => $item->questao,
            ];
        }
        return [ 'data' =>  $result ];
    }

    private function getMedia($idEstabelecimento, $id)
    {
        $data = DB::table('order_avaliacao_item')
            ->join('orders_avaliacoes', 'order_avaliacao_item.order_avaliacao_id', '=', 'orders_avaliacoes.id' )
            ->join('orders', 'orders_avaliacoes.order_id', '=', 'orders.id' )
            ->select('order_avaliacao_item.*')
            ->where('order_avaliacao_item.avaliacao_id', $id)
            ->where('orders.estabelecimento_id', $idEstabelecimento)
            ->get()
        ;

        if (empty($data))
        {
            return 0;
        }

        $nota = 0;
        $i = 0;
        foreach ($data as $item) {
            $nota += $item->nota;
            $i++;
        }

        return $nota / $i;
    }

//    public function index()
//    {
//        $user = User::find(1);
//
//        return $user;
//
//        $data = DB::select('select * from users where id = :id', ['id' => 1]);
//        return $data[0]->id;
//    }




}
