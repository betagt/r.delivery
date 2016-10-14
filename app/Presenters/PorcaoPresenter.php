<?php

namespace CodeDelivery\Presenters;

use CodeDelivery\Transformers\PorcaoTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class PorcaoPresenter
 *
 * @package namespace CodeDelivery\Presenters;
 */
class PorcaoPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new PorcaoTransformer();
    }
}
