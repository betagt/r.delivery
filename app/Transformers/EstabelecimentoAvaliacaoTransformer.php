<?php

namespace CodeDelivery\Transformers;

use League\Fractal\TransformerAbstract;
use CodeDelivery\Models\EstabelecimentoAvaliacao;

/**
 * Class EstabelecimentoAvaliacaoTransformer
 * @package namespace CodeDelivery\Transformers;
 */
class EstabelecimentoAvaliacaoTransformer extends TransformerAbstract
{

    protected $availableIncludes = [ 'client', 'estabelecimento' ];
    /**
     * Transform the \EstabelecimentoAvaliacao entity
     * @param \EstabelecimentoAvaliacao $model
     *
     * @return array
     */
    public function transform(EstabelecimentoAvaliacao $model)
    {
        return [
            'id'         => (int) $model->id,
            'mensagem'   => (string) $model->mensagem,
            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }

    public function includeClient(EstabelecimentoAvaliacao $model)
    {
        if (!$model->client)
        {
            return null;
        }
        return $this->item($model->client, new UserTransformer());
    }

    public function includeEstabelecimento(EstabelecimentoAvaliacao $model)
    {
        if (!$model->estabelecimento)
        {
            return null;
        }
        return $this->item($model->estabelecimento, new EstabelecimentoTransformer());
    }
}
