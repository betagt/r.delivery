<?php

namespace CodeDelivery\Presenters;

use CodeDelivery\Transformers\CategoryPorcaoTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class CategoryPorcaoPresenter
 *
 * @package namespace CodeDelivery\Presenters;
 */
class CategoryPorcaoPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new CategoryPorcaoTransformer();
    }
}
