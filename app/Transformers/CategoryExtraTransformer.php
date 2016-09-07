<?php

namespace CodeDelivery\Transformers;

use League\Fractal\TransformerAbstract;
use CodeDelivery\Models\CategoryExtra;

/**
 * Class CategoryExtraTransformer
 * @package namespace CodeDelivery\Transformers;
 */
class CategoryExtraTransformer extends TransformerAbstract
{

    /**
     * Transform the \CategoryExtra entity
     * @param \CategoryExtra $model
     *
     * @return array
     */
    public function transform(CategoryExtra $model)
    {
        return [
            'id'         => (int) $model->id,
            'name'       => (string) $model->name,
            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
