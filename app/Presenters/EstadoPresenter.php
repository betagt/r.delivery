<?php

namespace CodeDelivery\Presenters;

use CodeDelivery\Transformers\EstadoTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class EstadoPresenter
 *
 * @package namespace CodeDelivery\Presenters;
 */
class EstadoPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new EstadoTransformer();
    }
}
