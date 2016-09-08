<?php

namespace CodeDelivery\Presenters;

use CodeDelivery\Transformers\CategoryExtraTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class CategoryExtraPresenter
 *
 * @package namespace CodeDelivery\Presenters;
 */
class CategoryExtraPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new CategoryExtraTransformer();
    }
}
