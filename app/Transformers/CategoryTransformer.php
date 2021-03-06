<?php

namespace CodeDelivery\Transformers;

use CodeDelivery\Models\CategoryPorcao;
use League\Fractal\TransformerAbstract;
use CodeDelivery\Models\Category;

/**
 * Class CategoryTransformer
 * @package namespace CodeDelivery\Transformers;
 */
class CategoryTransformer extends TransformerAbstract
{
    protected $defaultIncludes = ['filhos', 'products', 'porcoes', 'parent'];

    /**
     * Transform the \Category entity
     * @param \Category $model
     *
     * @return array
     */
    public function transform(Category $model)
    {
        return [
            'id' => (int)$model->id,
            'estabelecimento_id' => (int)$model->estabelecimento_id,
            'parent_id' => (int)$model->parent_id,
            'name' => (string)$model->name,
            'tipo' => (int)$model->tipo,
            'multi' => (int)$model->multi,
            'status' => (int)$model->status,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }

    public function includeEstabelecimento(Category $model)
    {
        if (!$model->estabelecimento) {
            return null;
        }
        return $this->item($model->estabelecimento, new EstabelecimentoTransformer());
    }

    public function includeProducts(Category $model)
    {
        if (!$model->products) {
            return null;
        }
        return $this->collection($model->products, new ProductTransformer());
    }

    public function includePorcoes(Category $model)
    {
        if (!$model->porcoes)
        {
            return null;
        }
        return $this->collection($model->porcoes, new CategoryPorcaoTransformer());
    }

    public function includeFilhos(Category $model)
    {
        if (!$model->children)
        {
            return null;
        }
        return $this->collection($model->children, new CategoryTransformer());
    }

    public function includeParent(Category $model)
    {
        if (!$model->parent)
        {
            return null;
        }
        return $this->item($model->parent, new CategoryParentTransformer());
    }
}
