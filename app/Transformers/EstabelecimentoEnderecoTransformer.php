<?php

namespace CodeDelivery\Transformers;

use League\Fractal\TransformerAbstract;
use CodeDelivery\Models\EstabelecimentoEndereco;

/**
 * Class EstabelecimentoEnderecoTransformer
 * @package namespace CodeDelivery\Transformers;
 */
class EstabelecimentoEnderecoTransformer extends TransformerAbstract
{

    /**
     * Transform the \EstabelecimentoEndereco entity
     * @param \EstabelecimentoEndereco $model
     *
     * @return array
     */
    public function transform(EstabelecimentoEndereco $model)
    {
        return [
            'id'            => (int) $model->id,
            'endereco'      => (string) $model->endereco,
            'complemento'   => (string) $model->complemento,
            'numero'        => (string) $model->numero,
            'bairro'        => (string) $model->bairro,
            'cidade'        => (string) $model->cidade,
            'estado'        => (string) $model->estado,
            'cep'           => (string) $model->cep,
            'latitude'      => (string) $model->latitude,
            'longitude'     => (string) $model->longitude,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
