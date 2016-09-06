<?php

namespace CodeDelivery\Transformers;

use CodeDelivery\Models\EstabelecimentoEntrega;
use League\Fractal\TransformerAbstract;

/**
 * Class EstabelecimentoEntragaTransformer
 * @package namespace CodeDelivery\Transformers;
 */
class EstabelecimentoEntregaTransformer extends TransformerAbstract
{

    /**
     * Transform the \EstabelecimentoEntraga entity
     * @param \EstabelecimentoEntraga $model
     *
     * @return array
     */
    public function transform(EstabelecimentoEntrega $model)
    {
        return [
            'id'                => (int) $model->id,
            'tempo_entrega'     => (int)$model->tempo_entrega,
            'faixa_preco'       =>(int)$model->faixa_preco,
            'tipo_pagamento'    => (int)$model->tipo_pagamento,
            'tipo_entrega'      => (int) $model->tipo_entrega,
            'label_tempo_entrega'     => (string) $this->returnTempoEntrega($model->tempo_entrega),
            'label_faixa_preco'       => (string) $this->returnFaixaPreco($model->faixa_preco),
            'label_tipo_pagamento'    => (string) $this->returnTipoPagamento($model->tipo_pagamento),
            'label_tipo_entrega'      => (string) $this->returnTipoEntrega($model->tipo_entrega),
            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }

    public function returnTempoEntrega($value)
    {
        switch ($value)
        {
            case 1 :
                return '30 min';
            case 2 :
                return '45 min';
        }
    }

    public function returnFaixaPreco($value)
    {
        switch ($value)
        {
            case 1 :
                return 'até 15 reais';
            case 2 :
                return '16 e 30 reais';
            case 3 :
                return '30 a 45 reais';
        }
    }

    public function returnTipoPagamento($value)
    {
        switch ($value)
        {
            case 1 :
                return 'Cartão de Débito';
            case 2 :
                return 'Cartão de Crédito';
            case 3 :
                return 'Cartão de Crédito/Débito';
        }
    }

    public function returnTipoEntrega($value)
    {
        switch ($value)
        {
            case 1 :
                return 'Rango Delivery';
            case 2 :
                return 'Entrega através do estabelecimento';
        }
    }
}
