<?php

namespace CodeDelivery\Presenters;

use CodeDelivery\Transformers\CozinhaTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class CozinhaPresenter
 *
 * @package namespace CodeDelivery\Presenters;
 */
class CozinhaPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new CozinhaTransformer();
    }
}
