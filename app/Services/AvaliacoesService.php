<?php

namespace CodeDelivery\Services;

use CodeDelivery\Repositories\OrderAvaliacaoRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AvaliacoesService
{
    /**
     * @var OrderAvaliacaoRepository
     */
    private $repository;

    public function __construct(OrderAvaliacaoRepository $repository)
    {
        $this->repository = $repository;
    }

    public function store(Request $request, $id)
    {
        $data = $request->all();

        DB::beginTransaction();
        try {
            $data['status'] = 0;
            $data['order_id'] = $id;
            $items = $data['items'];

            $entity = $this->repository->create($data);

            foreach ($items as $item) {
                DB::insert(
                    'INSERT INTO order_delivery_addresses (avaliacao_id, order_avaliacao_id, nota) VALUES (?, ?)',
                    [ $item['avaliacao_id'], $entity->id, $item['nota']]
                );
            }

            DB::commit();

            unset($data);

            return $this->repository->skipPresenter(false)->find($entity->id);
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }
    
    public function returnAvaliacoesByEstabelecimento($id)
    {
        $data = DB::table('orders_avaliacoes')
            ->join('orders', 'orders_avaliacoes.order_id', '=', 'orders.id')
            ->select('orders_avaliacoes.*')
            ->where('orders.estabelecimento_id', $id)
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

    public function returnItemsAvaliadosByEstabelecimento($id)
    {
        $avaliacoes = $this->repository->findWhere(['status' => 1])->all();

        $result = [];
        foreach ($avaliacoes as $item) {
            $result[] = [
                'nota' => $this->getMedia($id, $item->id),
                'questao' => $item->questao,
            ];
        }
        return [ 'data' =>  $result ];
    }

    public function getMedia($idEstabelecimento, $id)
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
}