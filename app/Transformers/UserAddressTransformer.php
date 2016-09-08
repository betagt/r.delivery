<?php

namespace CodeDelivery\Transformers;

use League\Fractal\TransformerAbstract;
use CodeDelivery\Models\UserAddress;

/**
 * Class UserAddressTransformer
 * @package namespace CodeDelivery\Transformers;
 */
class UserAddressTransformer extends TransformerAbstract
{

    /**
     * Transform the \UserAddress entity
     * @param \UserAddress $model
     *
     * @return array
     */
    public function transform(UserAddress $model)
    {
        return [
            'id'         => (int) $model->id,
            'address'    => (string) $model->address,
            'complement' => (string) $model->complement,
            'number'     => (string) $model->number,
            'neighborhood' => (string) $model->neighborhood,
            'city'       => (string) $model->city,
            'state'      => (string) $model->state,
            'zipcode'    => (string) $model->zipcode,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
