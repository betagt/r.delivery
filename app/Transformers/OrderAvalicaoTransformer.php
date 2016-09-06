<?php

namespace CodeDelivery\Transformers;

use League\Fractal\TransformerAbstract;
use CodeDelivery\Models\OrderAvaliacao;

/**
 * Class OrderAvaliacaoTransformer
 * @package namespace CodeDelivery\Transformers;
 */
class OrderAvaliacaoTransformer extends TransformerAbstract
{

    protected $availableIncludes = ['order'];

    /**
     * Transform the \OrderAvaliacao entity
     * @param \OrderAvaliacao $model
     *
     * @return array
     */
    public function transform(OrderAvaliacao $model)
    {
        return [
            'id'         => (int) $model->id,
            'mensagem'   => (string) $model->mensagem,
            'nota'   => (int) $model->nota,
            'status'   => (int) $model->status,

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }

    public function includeOrder(OrderAvaliacao $model)
    {
        if (!$model->order)
        {
            return null;
        }
        return $this->item($model->order, new OrderAvaliacaoTransformer());
    }
}
