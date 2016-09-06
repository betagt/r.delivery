<?php

namespace CodeDelivery\Presenters;

use CodeDelivery\Transformers\EstabelecimentoFuncionamentoTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class EstabelecimentoFuncionamentoPresenter
 *
 * @package namespace CodeDelivery\Presenters;
 */
class EstabelecimentoFuncionamentoPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new EstabelecimentoFuncionamentoTransformer();
    }
}
