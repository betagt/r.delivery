<?php

namespace CodeDelivery\Transformers;

use League\Fractal\TransformerAbstract;
use CodeDelivery\Models\PorcaoCategoryProduct;

/**
 * Class PorcaoCategoryProductTransformer
 * @package namespace CodeDelivery\Transformers;
 */
class PorcaoCategoryProductTransformer extends TransformerAbstract
{

    /**
     * Transform the \PorcaoCategoryProduct entity
     * @param \PorcaoCategoryProduct $model
     *
     * @return array
     */
    public function transform(PorcaoCategoryProduct $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
