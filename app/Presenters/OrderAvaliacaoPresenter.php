<?php

namespace CodeDelivery\Presenters;

use CodeDelivery\Transformers\OrderAvaliacaoTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class OrderAvaliacaoPresenter
 *
 * @package namespace CodeDelivery\Presenters;
 */
class OrderAvaliacaoPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new OrderAvaliacaoTransformer();
    }
}
