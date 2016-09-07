<?php

namespace CodeDelivery\Transformers;

use CodeDelivery\Models\Product;
use League\Fractal\TransformerAbstract;
use CodeDelivery\Models\OrderItem;

/**
 * Class OrderItemTransformer
 * @package namespace App\Transformers;
 */
class OrderItemTransformer extends TransformerAbstract
{
    #protected $defaultIncludes = ['cupom','items'];
    protected  $defaultIncludes = ['product'];
    /**
     * Transform the \OrderItem entity
     * @param \OrderItem $model
     *
     * @return array
     */
    public function transform(OrderItem $model)
    {
        return [
            'id'         => (int) $model->id,
            'product_id' => (int) $model->product_id,
            'qtd'        => (int) $model->qtd,
            'price'      => (float) str_replace(',','.', preg_replace('#[^\d\,]#is','',$model->price)),
            'price_label'      => (string)$model->price,
            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
    public function includeProduct(OrderItem $model){
        if(!$model->product){
            return null;
        }
        return $this->item($model->product,new ProductTransformer());
    }
}
