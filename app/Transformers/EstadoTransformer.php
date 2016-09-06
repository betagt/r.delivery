<?php

namespace CodeDelivery\Transformers;

use CodeDelivery\Models\Cidade;
use League\Fractal\TransformerAbstract;
use CodeDelivery\Models\Estado;

/**
 * Class EstadoTransformer
 * @package namespace CodeDelivery\Transformers;
 */
class EstadoTransformer extends TransformerAbstract
{
    protected $availableIncludes = ['cidades'];

    /**
     * Transform the \Estado entity
     * @param \Estado $model
     *
     * @return array
     */
    public function transform(Estado $model)
    {
        return [
            'id'         => (int) $model->id,
            'uf'         => (string) $model->uf,
            'nome'       => (string) $model->nome,
            'status'     => (int) $model->status,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }

    public function includeCidades(Estado $model)
    {
        if (!$model->cidades)
        {
            return null;
        }
        return $this->collection($model->cidades, new CidadeTransformer());
    }
}
