<?php

namespace CodeDelivery\Transformers;

use League\Fractal\TransformerAbstract;
use CodeDelivery\Models\Category;

/**
 * Class CategoryTransformer
 * @package namespace CodeDelivery\Transformers;
 */
class CategoryTransformer extends TransformerAbstract
{
    protected $defaultIncludes = ['filhos', 'products'];
    /**
     * Transform the \Category entity
     * @param \Category $model
     *
     * @return array
     */
    public function transform(Category $model)
    {
        return [
            'id'           => (int) $model->id,
            'estabelecimento_id'    => (int) $model->estabelecimento_id,
            'parent_id'    => (int) $model->parent_id,
            'name'         => (string) $model->name,
            'tipo'         => (int) $model->tipo,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }

    public function includeEstabelecimento(Category $model)
    {
        if (!$model->estabelecimento)
        {
            return null;
        }
        return $this->item($model->estabelecimento, new EstabelecimentoTransformer());
    }

    public function includeProducts(Category $model)
    {
        if (!$model->products)
        {
            return null;
        }
        return $this->collection($model->products, new ProductTransformer());
    }

    public function includeFilhos(Category $model)
    {
        if (!$model->children)
        {
            return null;
        }
        return $this->collection($model->children, new CategoryTransformer());
    }
}
