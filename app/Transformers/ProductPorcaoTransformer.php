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

    protected $defaultIncludes = ['categories'];

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
            'nome'              => (string) $model->nome,
            'preco'             => (float) str_replace(',','.', preg_replace('#[^\d\,]#is','',$model->preco)),
            'preco_label'       => (string)$model->preco,
            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }

    public function includeCategories(ProductPorcao $model)
    {
        if (!$model->categories)
        {
            return null;
        }
        return $this->collection($model->categories, new ProductPorcaoCategoryTransformer());
    }

}
