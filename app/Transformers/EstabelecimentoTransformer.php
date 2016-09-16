<?php

namespace CodeDelivery\Transformers;

use CodeDelivery\Models\Estabelecimento;
use Illuminate\Support\Facades\DB;
use League\Fractal\TransformerAbstract;

/**
 * Class EstabelecimentosTransformer
 * @package namespace CodeDelivery\Transformers;
 */
class EstabelecimentoTransformer extends TransformerAbstract
{

    protected  $availableIncludes = ['cidade', 'entrega','endereco', 'avaliacoes', 'funcionamentos', 'produtos', 'orders', 'cozinhas'];
    /**
     * Transform the \Estabelecimentos entity
     * @param \Estabelecimentos $model
     *
     * @return array
     */
    public function transform(Estabelecimento $model)
    {
        return [
            'id'         => (int) $model->id,
            'icone'      => (string) $model->icone,
            'nome'       => (string) $model->nome,
            'descricao'  => (string) $model->descricao,
            'email'      => (string) $model->email,
            'telefone'   => (string) $model->telefone,
            'status'     => (int) $model->status,
            'power'      => (int) $model->power,
            'label_power'=> (string) $this->returnPower($model->power),
            'avaliacoes' => $this->avaliacoes($model->id),
            'nota'       => $this->getNotaFinal($model->id),
            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }

    public function returnPower($value)
    {
        $result = null;
        switch ($value)
        {
            case 1 :
                $result = "on";
                break;
            case 2 :
                $result = "off";
                break;
            default :
                $result = "on";
                break;
        }
        return $result;
    }

    public function includeEndereco(Estabelecimento $model)
    {
        if (!$model->endereco)
        {
            return null;
        }
        return $this->item($model->endereco, new EstabelecimentoEnderecoTransformer());
    }

    public function includeCidade(Estabelecimento $model)
    {
        if (!$model->cidade)
        {
            return null;
        }
        return $this->item($model->cidade, new CidadeTransformer());
    }

    public function includeEntrega(Estabelecimento $model)
    {
        if (!$model->entrega)
        {
            return null;
        }
        return $this->item($model->entrega, new EstabelecimentoEntregaTransformer());
    }

    public function includeFuncionamentos(Estabelecimento $model)
    {
        if (!$model->funcionamentos)
        {
            return null;
        }
        return $this->collection($model->funcionamentos, new EstabelecimentoFuncionamentoTransformer());
    }

    public function includeProdutos(Estabelecimento $model)
    {
        if (!$model->produtos)
        {
            return null;
        }
        return $this->collection($model->produtos, new ProductTransformer());
    }

    public function includeOrders(Estabelecimento $model)
    {
        if (!$model->orders)
        {
            return null;
        }
        return $this->collection($model->orders, new OrderTransformer());
    }

    public function includeCozinhas(Estabelecimento $model)
    {
        if (!$model->cozinhas)
        {
            return null;
        }
        return $this->collection($model->cozinhas, new CozinhaTransformer());
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

    public function getNotaFinal($id)
    {
        $avaliacoes = DB::table('order_avaliacao_item')
            ->join('orders_avaliacoes', 'order_avaliacao_item.order_avaliacao_id', '=', 'orders_avaliacoes.id')
            ->join('orders', 'orders_avaliacoes.order_id', '=', 'order_id.id')
            ->select('order_avaliacao_item.nota')
            ->where('orders.estabelecimento_id', $id)
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
