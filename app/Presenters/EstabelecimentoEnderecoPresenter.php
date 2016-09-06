<?php

namespace CodeDelivery\Presenters;

use CodeDelivery\Transformers\EstabelecimentoEnderecoTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class EstabelecimentoEnderecoPresenter
 *
 * @package namespace CodeDelivery\Presenters;
 */
class EstabelecimentoEnderecoPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new EstabelecimentoEnderecoTransformer();
    }
}
