<?php

namespace CodeDelivery\Transformers;

use CodeDelivery\Models\CategoryParent;
use League\Fractal\TransformerAbstract;

/**
 * Class CategoryTransformer
 * @package namespace CodeDelivery\Transformers;
 */
class CategoryParentTransformer extends TransformerAbstract
{
    /**
     * Transform the \Category entity
     * @param \Category $model
     *
     * @return array
     */
    public function transform(CategoryParent $model)
    {
        return [
            'id' => (int)$model->id,
            'estabelecimento_id' => (int)$model->estabelecimento_id,
            'parent_id' => (int)$model->parent_id,
            'name' => (string)$model->name,
            'tipo' => (int)$model->tipo,
            'multi' => (int)$model->multi,
            'status' => (int)$model->status,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
