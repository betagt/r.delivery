<?php

namespace CodeDelivery\Presenters;

use CodeDelivery\Transformers\EstabelecimentoAvaliacaoTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class EstabelecimentoAvaliacaoPresenter
 *
 * @package namespace CodeDelivery\Presenters;
 */
class EstabelecimentoAvaliacaoPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new EstabelecimentoAvaliacaoTransformer();
    }
}
