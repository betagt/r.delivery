<?php

namespace CodeDelivery\Presenters;

use CodeDelivery\Transformers\ProductPorcaoTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ProductPorcaoPresenter
 *
 * @package namespace CodeDelivery\Presenters;
 */
class ProductPorcaoPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ProductPorcaoTransformer();
    }
}
