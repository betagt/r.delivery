<?php

namespace CodeDelivery\Transformers;

use League\Fractal\TransformerAbstract;
use CodeDelivery\Models\PorcaoCategory;

/**
 * Class PorcaoCategoryTransformer
 * @package namespace CodeDelivery\Transformers;
 */
class PorcaoCategoryTransformer extends TransformerAbstract
{

    /**
     * Transform the \PorcaoCategory entity
     * @param \PorcaoCategory $model
     *
     * @return array
     */
    public function transform(PorcaoCategory $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
