<?php

namespace CodeDelivery\Presenters;

use CodeDelivery\Transformers\ProductExtraTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ProductExtraPresenter
 *
 * @package namespace CodeDelivery\Presenters;
 */
class ProductExtraPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ProductExtraTransformer();
    }
}
