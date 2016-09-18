<?php

namespace CodeDelivery\Transformers;

use League\Fractal\TransformerAbstract;
use CodeDelivery\Models\Avaliacao;

/**
 * Class AvaliacaoTransformer
 * @package namespace CodeDelivery\Transformers;
 */
class AvaliacaoTransformer extends TransformerAbstract
{

    /**
     * Transform the \Avaliacao entity
     * @param \Avaliacao $model
     *
     * @return array
     */
    public function transform(Avaliacao $model)
    {
        return [
            'id'         => (int) $model->id,
            'questao'         => (string) $model->questao,
            'status'         => (int) $model->status,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
