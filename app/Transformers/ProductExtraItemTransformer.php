<?php

namespace CodeDelivery\Transformers;

use League\Fractal\TransformerAbstract;
use CodeDelivery\Models\ProductExtraItem;

/**
 * Class ProductExtraItemTransformer
 * @package namespace CodeDelivery\Transformers;
 */
class ProductExtraItemTransformer extends TransformerAbstract
{

    /**
     * Transform the \ProductExtraItem entity
     * @param \ProductExtraItem $model
     *
     * @return array
     */
    public function transform(ProductExtraItem $model)
    {
        return [
            'id'            => (int) $model->id,
            'name'          => (string) $model->name,
            'price'         => (float) $model->price,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
