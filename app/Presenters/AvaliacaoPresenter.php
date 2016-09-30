<?php

namespace CodeDelivery\Presenters;

use CodeDelivery\Transformers\AvaliacaoTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class AvaliacaoPresenter
 *
 * @package namespace CodeDelivery\Presenters;
 */
class AvaliacaoPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new AvaliacaoTransformer();
    }
}
