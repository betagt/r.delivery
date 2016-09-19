<?php

namespace CodeDelivery\Presenters;

use CodeDelivery\Transformers\PorcaoCategoryProductTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class PorcaoCategoryProductPresenter
 *
 * @package namespace CodeDelivery\Presenters;
 */
class PorcaoCategoryProductPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new PorcaoCategoryProductTransformer();
    }
}
