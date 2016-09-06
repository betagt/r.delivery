<?php

namespace CodeDelivery\Transformers;

use League\Fractal\TransformerAbstract;
use CodeDelivery\Models\Cozinha;

/**
 * Class CozinhaTransformer
 * @package namespace CodeDelivery\Transformers;
 */
class CozinhaTransformer extends TransformerAbstract
{

    /**
     * Transform the \Cozinha entity
     * @param \Cozinha $model
     *
     * @return array
     */
    public function transform(Cozinha $model)
    {
        return [
            'id'         => (int) $model->id,
            'nome'       => (string) $model->nome,
            'status'     => (int) $model->status,
            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
