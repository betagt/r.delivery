<?php

namespace CodeDelivery\Presenters;

use CodeDelivery\Transformers\EstabelecimentoTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class EstabelecimentoPresenter
 *
 * @package namespace CodeDelivery\Presenters;
 */
class EstabelecimentoPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new EstabelecimentoTransformer();
    }
}
