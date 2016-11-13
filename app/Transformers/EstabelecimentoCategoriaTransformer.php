<?php

namespace CodeDelivery\Transformers;

use League\Fractal\TransformerAbstract;
use CodeDelivery\Models\EstabelecimentoCategoria;

/**
 * Class EstabelecimentoCategoriaTransformer
 * @package namespace CodeDelivery\Transformers;
 */
class EstabelecimentoCategoriaTransformer extends TransformerAbstract
{
    protected  $availableIncludes = ['estabelecimentos'];
    /**
     * Transform the \EstabelecimentoCategoria entity
     * @param \EstabelecimentoCategoria $model
     *
     * @return array
     */
    public function transform(EstabelecimentoCategoria $model)
    {
        return [
            'id'        => (int)$model->id,
            'titulo'    => (string)$model->titulo,
            'slug'      => (string)$model->slug,
            'legenda'      => (string)$model->legenda,
            'icon'      => (string)$model->icon,
            'status'      => (integer)$model->status,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }

    public function includeEstabelecimentos(EstabelecimentoCategoria $model)
    {
        if (!$model->estabelecimentos)
        {
            return null;
        }
        return $this->collection($model->estabelecimentos, new EstabelecimentoTransformer());
    }
}
