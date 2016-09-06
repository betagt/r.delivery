<?php

namespace CodeDelivery\Presenters;

use CodeDelivery\Transformers\EstabelecimentoEntregaTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class EstabelecimentoEntregaPresenter
 *
 * @package namespace CodeDelivery\Presenters;
 */
class EstabelecimentoEntregaPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new EstabelecimentoEntregaTransformer();
    }
}
