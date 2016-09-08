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
            'price'         => (float) str_replace(',','.', preg_replace('#[^\d\,]#is','',$model->price)),
            'price_label'   => (string) $model->price,

            /* place your other model properties here */

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
}
