<?php

namespace CodeDelivery\Presenters;

use CodeDelivery\Transformers\CidadeTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class CidadePresenter
 *
 * @package namespace CodeDelivery\Presenters;
 */
class CidadePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new CidadeTransformer();
    }
}
