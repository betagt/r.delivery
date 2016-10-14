<?php

namespace CodeDelivery\Transformers;

use League\Fractal\TransformerAbstract;
use CodeDelivery\Models\ProductPorcao;

/**
 * Class ProductPorcaoTransformer
 * @package namespace CodeDelivery\Transformers;
 */
class ProductPorcaoTransformer extends TransformerAbstract
{

    protected $availableIncludes = ['product'];

    protected $defaultIncludes = ['porcao'];

    /**
     * Transform the \ProductPorcao entity
     * @param \ProductPorcao $model
     *
     * @return array
     */
    public function transform(ProductPorcao $model)
    {
        return [
            'id'                => (int) $model->id,
            'product_id'        => (string) $model->product_id,
            'porcao_id'         => (string) $model->porcao_id,
            'price'             => (float) str_replace(',','.', preg_replace('#[^\d\,]#is','',$model->preco)),
            'price_label'       => (string)$model->preco,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }

    public function includeProduct(ProductPorcao $model)
    {
        if (!$model->product)
        {
            return null;
        }
        return $this->item($model->product, new ProductTransformer());
    }

    public function includePorcao(ProductPorcao $model)
    {
        if (!$model->porcao)
        {
            return null;
        }
        return $this->item($model->porcao, new PorcaoTransformer());
    }

}
