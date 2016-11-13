<?php

namespace CodeDelivery\Presenters;

use CodeDelivery\Transformers\EstabelecimentoCategoriaTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class EstabelecimentoCategoriaPresenter
 *
 * @package namespace CodeDelivery\Presenters;
 */
class EstabelecimentoCategoriaPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new EstabelecimentoCategoriaTransformer();
    }
}
