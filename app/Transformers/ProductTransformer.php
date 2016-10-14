<?php

namespace CodeDelivery\Transformers;

use CodeDelivery\Models\CategoryExtra;
use CodeDelivery\Presenters\ProductPresenter;
use League\Fractal\TransformerAbstract;
use CodeDelivery\Models\Product;

/**
 * Class ProductTransformer
 * @package namespace App\Transformers;
 */
class ProductTransformer extends TransformerAbstract
{

    protected $availableIncludes = [ 'estabelecimento', 'category'];

    protected $defaultIncludes = [ 'filhos', 'porcoes'  ];
    /**
     * Transform the \Product entity
     * @param \Product $model
     *
     * @return array
     */
    public function transform(Product $model)
    {
        return [
            'id'                    => (int) $model->id,
            'category_id'           => (int) $model->category_id,
            'name'                  => (string) $model->name,
            'description'           => (string) $model->description,
            'price'                 => (float) str_replace(',','.', preg_replace('#[^\d\,]#is','',$model->price)),
            'price_label'           => (string) $model->price,
            /* place your other model properties here */

            'created_at'            => $model->created_at,
            'updated_at'            => $model->updated_at
        ];
    }

    public function includePorcoes(Product $model)
    {
        if (!$model->porcoes)
        {
            return null;
        }
        return $this->collection($model->porcoes, new ProductPorcaoTransformer());
    }

    public function includeFilhos(Product $model)
    {
        if (!$model->children)
        {
            return null;
        }
        return $this->collection($model->children, new ProductTransformer());
    }
}
