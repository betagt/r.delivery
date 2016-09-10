<?php

namespace CodeDelivery\Transformers;

use League\Fractal\TransformerAbstract;
use CodeDelivery\Models\Assunto;

/**
 * Class AssuntoTransformer
 * @package namespace CodeDelivery\Transformers;
 */
class AssuntoTransformer extends TransformerAbstract
{

    /**
     * Transform the \Assunto entity
     * @param \Assunto $model
     *
     * @return array
     */
    public function transform(Assunto $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
