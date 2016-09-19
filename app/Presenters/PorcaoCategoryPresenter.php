<?php

namespace CodeDelivery\Presenters;

use CodeDelivery\Transformers\PorcaoCategoryTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class PorcaoCategoryPresenter
 *
 * @package namespace CodeDelivery\Presenters;
 */
class PorcaoCategoryPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new PorcaoCategoryTransformer();
    }
}
