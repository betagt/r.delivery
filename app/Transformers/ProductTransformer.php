<?php

namespace CodeDelivery\Transformers;

use League\Fractal\TransformerAbstract;
use CodeDelivery\Models\Product;

/**
 * Class ProductTransformer
 * @package namespace App\Transformers;
 */
class ProductTransformer extends TransformerAbstract
{

    protected $availableIncludes = [ 'estabelecimento', 'category' ];

    //protected $defaultIncludes = ['category'];
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
            'estabelecimento_id'    => (int) $model->estabelecimento_id,
            'category_id'           => (int) $model->category_id,
            'name'                  => (string) $model->name,
            'description'           => (string) $model->description,
            'price'                 => (float) str_replace(',','.', preg_replace('#[^\d\,]#is','',$model->price)),
            'price_label'                 => (string) $model->price,
            /* place your other model properties here */

            'created_at'            => $model->created_at,
            'updated_at'            => $model->updated_at
        ];
    }

    public function includeEstabelecimento(Product $model)
    {
        if (!$model->estabelecimento)
        {
            return null;
        }
        return $this->item($model->estabelecimento, new EstabelecimentoEnderecoTransformer());
    }

    public function includeCategory(Product $model)
    {
        if (!$model->category)
        {
            return null;
        }
        return $this->item($model->category, new CategoryTransformer());
    }
}
