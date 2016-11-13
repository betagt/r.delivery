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

    protected $availableIncludes = [
        'user', 'cidade', 'categoria', 'entrega', 'endereco', 'items', 'funcionamentos', 'produtos', 'orders', 'cozinhas'
    ];

    /**
     * Transform the \Estabelecimentos entity
     * @param \Estabelecimentos $model
     *
     * @return array
     */
    public function transform(Estabelecimento $model)
    {
        return [
            'id' => (int)$model->id,
            'user_id' => (integer) $model->user->id,
            'estabelecimento_categoria_id' => (integer)$model->estabelecimento_categoria_id,
            'cidade_id' => (integer)$model->cidade_id,
            'icone' => (string)$model->icone,
            'nome' => (string)$model->nome,
            'descricao' => (string)$model->descricao,
            'email' => (string)$model->email,
            'telefone' => (string)$model->telefone,
            'status' => (int)$model->status,
            'power' => (int)$model->power,
            'label_status' => (string)$this->returnStatus($model->status),
            'label_power' => (string)$this->returnPower($model->power),
            'nota' => $this->getNotaFinal($model->id),
            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }

    public function returnPower($value)
    {
        $result = null;
        switch ($value) {
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

    public function returnStatus($value)
    {
        $result = null;
        switch ($value) {
            case 1 :
                $result = "Ativo";
                break;
            case 2 :
                $result = "Inativo";
                break;
        }
        return $result;
    }

    public function includeEndereco(Estabelecimento $model)
    {
        if (!$model->endereco) {
            return null;
        }
        return $this->item($model->endereco, new EstabelecimentoEnderecoTransformer());
    }

    public function includeCategoria(Estabelecimento $model)
    {
        if (!$model->estabelecimentoCategoria) {
            return null;
        }
        return $this->item($model->estabelecimentoCategoria, new EstabelecimentoCategoriaTransformer());
    }

    public function includeUser(Estabelecimento $model)
    {
        if (!$model->user) {
            return null;
        }
        return $this->item($model->user, new UserTransformer());
    }

    public function includeCidade(Estabelecimento $model)
    {
        if (!$model->cidade) {
            return null;
        }
        return $this->item($model->cidade, new CidadeTransformer());
    }

    public function includeEntrega(Estabelecimento $model)
    {
        if (!$model->entrega) {
            return null;
        }
        return $this->item($model->entrega, new EstabelecimentoEntregaTransformer());
    }

    public function includeFuncionamentos(Estabelecimento $model)
    {
        if (!$model->funcionamentos) {
            return null;
        }
        return $this->collection($model->funcionamentos, new EstabelecimentoFuncionamentoTransformer());
    }

    public function includeProdutos(Estabelecimento $model)
    {
        if (!$model->produtos) {
            return null;
        }
        return $this->collection($model->produtos, new ProductTransformer());
    }

    public function includeOrders(Estabelecimento $model)
    {
        if (!$model->orders) {
            return null;
        }
        return $this->collection($model->orders, new OrderTransformer());
    }

    public function includeCozinhas(Estabelecimento $model)
    {
        if (!$model->cozinhas) {
            return null;
        }
        return $this->collection($model->cozinhas, new CozinhaTransformer());
    }

    public function getNotaFinal($id)
    {
        $avaliacoes = DB::table('order_avaliacao_item')
            ->join('orders_avaliacoes', 'order_avaliacao_item.order_avaliacao_id', '=', 'orders_avaliacoes.id')
            ->join('orders', 'orders_avaliacoes.order_id', '=', 'orders.id')
            ->select('order_avaliacao_item.nota')
            ->where('orders.estabelecimento_id', $id)
            ->get();

        $result = 0;
        if (empty($avaliacoes)) {
            return $result;
        }

        $i = 0;
        foreach ($avaliacoes as $item) {
            $result += $item->nota;
            $i++;
        }
        return $result / $i;
    }
}
