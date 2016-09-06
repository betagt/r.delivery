<?php

namespace CodeDelivery\Transformers;

use League\Fractal\TransformerAbstract;
use CodeDelivery\Models\Cidade;

/**
 * Class CidadeTransformer
 * @package namespace CodeDelivery\Transformers;
 */
class CidadeTransformer extends TransformerAbstract
{
    protected $availableIncludes = ['estado'];

    /**
     * Transform the \Cidade entity
     * @param \Cidade $model
     *
     * @return array
     */
    public function transform(Cidade $model)
    {
        return [
            'id'         => (int) $model->id,
            'nome'       => (string) $model->nome,
            /* place your other model properties here */
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }

    public function includeEstado(Cidade $model)
    {
        if (!$model->estado) {
            return null;
        }
        return $this->item($model->estado, new EstadoTransformer());
    }



}