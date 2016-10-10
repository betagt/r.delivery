<?php

namespace CodeDelivery\Presenters;

use CodeDelivery\Transformers\ProductPorcaoCategoryTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ProductPorcaoCategoryPresenter
 *
 * @package namespace CodeDelivery\Presenters;
 */
class ProductPorcaoCategoryPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ProductPorcaoCategoryTransformer();
    }
}
