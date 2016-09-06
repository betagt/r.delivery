<?php

namespace CodeDelivery\Transformers;

use League\Fractal\TransformerAbstract;
use CodeDelivery\Models\Category;

/**
 * Class CategoryTransformer
 * @package namespace CodeDelivery\Transformers;
 */
class CategoryTransformer extends TransformerAbstract
{
    /**
     * Transform the \Category entity
     * @param \Category $model
     *
     * @return array
     */
    public function transform(Category $model)
    {
        return [
            'id'           => (int) $model->id,
            'name'         => (string) $model->name,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }

    public function includeProducts(Category $model)
    {
        if (!$model->products) {
            return null;
        }
        return $this->collection($model->products, new ProductTransformer());
    }
}
