<?php

namespace CodeDelivery\Transformers;

use League\Fractal\TransformerAbstract;
use CodeDelivery\Models\ProductExtra;

/**
 * Class ProductExtraTransformer
 * @package namespace CodeDelivery\Transformers;
 */
class ProductExtraTransformer extends TransformerAbstract
{
    protected $defaultIncludes = [ 'extra' ];

    protected $availableIncludes = [ 'items' ];

    /**
     * Transform the \ProductExtra entity
     * @param \ProductExtra $model
     *
     * @return array
     */
    public function transform(ProductExtra $model)
    {
        return [
            'id'            => (int) $model->id,
            'tipo'         => (int) $model->tipo,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }

    public function includeExtra(ProductExtra $model)
    {
        if (!$model->extra)
        {
            return null;
        }
        return $this->item($model->extra, new CategoryExtraTransformer());
    }

    public function includeItems(ProductExtra $model)
    {
        if (!$model->items)
        {
            return null;
        }
        return $this->collection($model->items, new ProductExtraItemTransformer());
    }
}
