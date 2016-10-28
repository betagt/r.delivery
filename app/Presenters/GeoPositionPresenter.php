<?php

namespace CodeDelivery\Presenters;

use CodeDelivery\Transformers\GeoPositionTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class GeoPositionPresenter
 *
 * @package namespace CodeDelivery\Presenters;
 */
class GeoPositionPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new GeoPositionTransformer();
    }
}
