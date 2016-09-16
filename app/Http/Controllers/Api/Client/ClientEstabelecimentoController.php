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
            $value->products = [
                'data' => $this->productRepository->skipPresenter('false')->findWhere(['category_id' => $value->id])
            ];
            $result[] = $value;
        }
        return response()->json(['data' => $result ]);
    }

    public function returnAvaliacoesByEstabelecimento($id)
    {
        return response()->json($this->avaliacoes($id));
    }

    public function avaliacoes($idEstabelecimento)
    {
        $data = DB::table('orders_avaliacoes')
            ->join('orders', 'orders_avaliacoes.order_id', '=', 'orders.id')
            ->select('orders_avaliacoes.*')
            ->where('orders.estabelecimento_id', $idEstabelecimento)
            ->get()
        ;

        if (empty($data))
        {
            return null;
        }

        $result = [];

        foreach ($data as $item) {
            $user = $this->getUser($item->order_id);

            $result[] = [
                'mensagem' => $item->mensagem,
                'cliente' => $user->name,
                'created_at' => $item->created_at,
                'nota' => $this->getNota($item->id)
            ];
        }

        return [ 'data' => $result ];
    }

    public function getUser($orderId)
    {
        $user = DB::table('users')
            ->join('orders', 'users.id', '=', 'orders.id')
            ->select('users.*')
            ->where('orders.id', $orderId)
            ->first();
        return $user;
    }

    public function getNota($orderAvaliacaoId)
    {
        $avaliacoes = DB::table('order_avaliacao_item')
            ->join('orders_avaliacoes', 'order_avaliacao_item.order_avaliacao_id', '=', 'orders_avaliacoes.id')
            ->select('order_avaliacao_item.nota')
            ->where('order_avaliacao_item.order_avaliacao_id', $orderAvaliacaoId)
            ->get();

        $result = 0;
        if (empty($avaliacoes))
        {
            return $result;
        }

        $i = 0;
        foreach ($avaliacoes as $item) {
            $result += $item->nota;
            $i++;
        }
        return $result/$i;
    }
}
