<?php

namespace CodeDelivery\Presenters;

use CodeDelivery\Transformers\ProductExtraItemTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ProductExtraItemPresenter
 *
 * @package namespace CodeDelivery\Presenters;
 */
class ProductExtraItemPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ProductExtraItemTransformer();
    }
}
