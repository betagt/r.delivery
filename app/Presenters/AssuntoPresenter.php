<?php

namespace CodeDelivery\Presenters;

use CodeDelivery\Transformers\AssuntoTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class AssuntoPresenter
 *
 * @package namespace CodeDelivery\Presenters;
 */
class AssuntoPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new AssuntoTransformer();
    }
}
