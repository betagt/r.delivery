<?php

namespace CodeDelivery\Transformers;

use Illuminate\Database\Eloquent\Collection;
use League\Fractal\TransformerAbstract;
use CodeDelivery\Models\Order;

/**
 * Class OrderTransformer
 * @package namespace App\Transformers;
 */
class OrderTransformer extends TransformerAbstract
{
    #protected $defaultIncludes = ['cupom','items'];
    protected $availableIncludes = ['cupom', 'items', 'client', 'estabelecimento'];

    # protected $availableIncludes = [];

    /**
     * Transform the \Order entity
     * @param \Order $model
     *
     * @return array
     */
    public function transform(Order $model)
    {
        return [
            'id'                => (int)$model->id,
            'total'             => (float) str_replace(',','.', preg_replace('#[^\d\,]#is','',$model->total)),
            'total_label'       => (string)$model->total,
            'taxa_entrega'      => (float) $model->taxa_entrega,
            'status'            => (int)$model->status,
            'count_avaliacao'   => ($model->avaliacao)?(int) $model->avaliacao->where('order_id', $model->id)->count():0,
            'product_names'     => $this->getArrayProductNames($model->items),
            'endereco'          => $model->deliveryAddresses,
            'hash'              => $model->hash,
            'created_at'        => $model->created_at,
            'updated_at'        => $model->updated_at,
        ];
    }

    protected function getArrayProductNames(Collection $items)
    {
        $names = [];
        foreach ($items as $item) {
            $names[] = $item->product->name;
        }
        return $names;
    }

    public function includeCupom(Order $model)
    {
        if (!$model->cupom) {
            return null;
        }
        return $this->item($model->cupom, new CupomTransformer());
    }

    public function includeItems(Order $model)
    {
        if (!$model->items) {
            return null;
        }
        return $this->collection($model->items, new OrderItemTransformer());
    }

    public function includeClient(Order $model)
    {
        if (!$model->client) {
            return null;
        }
        return $this->item($model->client, new UserTransformer());
    }

    public function includeEstabelecimento(Order $model)
    {
        if (!$model->estabelecimento) {
            return null;
        }
        return $this->item($model->estabelecimento, new EstabelecimentoTransformer());
    }
}
