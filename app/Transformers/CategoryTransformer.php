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
    protected $defaultIncludes = ['filhos'];
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
            'parent_id'    => (int) $model->parent_id,
            'name'         => (string) $model->name,
            'tipo'         => (int) $model->tipo,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }

    public function includeFilhos(Category $model)
    {
        if (!$model->children)
        {
            return null;
        }
        return $this->collection($model->children, new CategoryTransformer());
    }

    public function includePai(Category $model)
    {
        if (!$model->parent)
        {
            return null;
        }
        return $this->item($model->parent, new CategoryTransformer());
    }
}
