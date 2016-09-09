<?php

namespace CodeDelivery\Transformers;

use League\Fractal\TransformerAbstract;
use CodeDelivery\Models\User;

/**
 * Class UserTransformer
 * @package namespace App\Transformers;
 */
class UserTransformer extends TransformerAbstract
{
    protected $defaultIncludes = [ 'address' ];
    /**
     * Transform the \User entity
     * @param \User $model
     *
     * @return array
     */
    public function transform(User $model)
    {
        return [
            'id'         => (int) $model->id,
            'name'       => $model->name,
            'email'       => $model->email,
            'telefone_celular'       => $model->telefone_celular,
            'role'       => $model->role,
            /* place your other model properties here */

            /*'created_at' => $model->created_at,
            'updated_at' => $model->updated_at*/
        ];
    }

    public function includeAddress(User $model){
        if(!$model->addresses)
            return null;

        return $this->collection($model->addresses, new UserAddressTransformer());
    }
}
