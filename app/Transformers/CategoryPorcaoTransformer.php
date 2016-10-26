<?php

namespace CodeDelivery\Transformers;

use League\Fractal\TransformerAbstract;
use CodeDelivery\Models\CategoryPorcao;

/**
 * Class CategoryPorcaoTransformer
 * @package namespace CodeDelivery\Transformers;
 */
class CategoryPorcaoTransformer extends TransformerAbstract
{

    /**
     * Transform the \CategoryPorcao entity
     * @param \CategoryPorcao $model
     *
     * @return array
     */
    public function transform(CategoryPorcao $model)
    {
        return [
            'id'         => (int) $model->id,
            'category_id'         => (int) $model->category_id,
            'porcao_id'         => (int) $model->porcao_id,
            'qtde'         => (int) $model->qtde,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
