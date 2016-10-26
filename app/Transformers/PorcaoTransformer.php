<?php

namespace CodeDelivery\Transformers;

use League\Fractal\TransformerAbstract;
use CodeDelivery\Models\Porcao;

/**
 * Class PorcaoTransformer
 * @package namespace CodeDelivery\Transformers;
 */
class PorcaoTransformer extends TransformerAbstract
{

    public function transform(Porcao $model)
    {
        return [
            'id'         => (int) $model->id,
            'nome'         => (string) $model->nome,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
