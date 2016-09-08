<?php

namespace CodeDelivery\Presenters;

use CodeDelivery\Transformers\UserAddressTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class UserAddressPresenter
 *
 * @package namespace CodeDelivery\Presenters;
 */
class UserAddressPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new UserAddressTransformer();
    }
}
