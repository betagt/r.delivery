<?php

namespace CodeDelivery\Transformers;

use League\Fractal\TransformerAbstract;
use CodeDelivery\Models\ProductPorcaoCategory;

/**
 * Class ProductPorcaoCategoryTransformer
 * @package namespace CodeDelivery\Transformers;
 */
class ProductPorcaoCategoryTransformer extends TransformerAbstract
{

    /**
     * Transform the \ProductPorcaoCategory entity
     * @param \ProductPorcaoCategory $model
     *
     * @return array
     */
    public function transform(ProductPorcaoCategory $model)
    {
        return [
            'id'                => (int) $model->id,
            'category_id'       => (int) $model->category_id,
            'product_porcao_id' => (int) $model->product_porcao_id,
            'qtde'              => (int) $model->qtde,
            'created_at'        => $model->created_at,
            'updated_at'        => $model->updated_at
        ];
    }
}
