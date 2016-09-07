<?php

namespace CodeDelivery\Transformers;

use League\Fractal\TransformerAbstract;
use CodeDelivery\Models\EstabelecimentoFuncionamento;

/**
 * Class EstabelecimentoFuncionamentoTransformer
 * @package namespace CodeDelivery\Transformers;
 */
class EstabelecimentoFuncionamentoTransformer extends TransformerAbstract
{

    /**
     * Transform the \EstabelecimentoFuncionamento entity
     * @param \EstabelecimentoFuncionamento $model
     *
     * @return array
     */
    public function transform(EstabelecimentoFuncionamento $model)
    {
        return [
            'id'                    => (int) $model->id,
            'dia_funcionamento'     => (int) $model->dia_funcionamento,
            'horario_funcionamento' => (int) $model->horario_funcionamento,
            'dia_funcionamento_label'     => (string) $this->returnDiaFuncionamento($model->dia_funcionamento),
            'horario_funcionamento_label' => (string) $this->returnHorarioFuncionamento($model->horario_funcionamento),
            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }

    public function returnDiaFuncionamento($value)
    {
        switch ($value)
        {
            case 1 :
                return 'Domingo';
            case 2 :
                return 'Segunda-feira';
            case 3 :
                return 'Terça-feira';
            case 4 :
                return 'Quarta-feira';
            case 5 :
                return 'Quinta-feira';
            case 6 :
                return 'Sexta-feira';
            case 7 :
                return 'Sábado';
        }
    }

    public function returnHorarioFuncionamento($value)
    {
        switch ($value)
        {
            case 1 :
                return '08:00 às 12:00';
            case 2 :
                return '14:00 às 18:00';
            case 3 :
                return '18:00 às 22:00';
            case 4 :
                return '08:00 às 18:00';
            case 5 :
                return '14:00 às 22:00';
        }
    }
}
