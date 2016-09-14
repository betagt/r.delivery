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
    protected $availableIncludes = [ 'mensagens' ];
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
            'id'                    => (int) $model->id,
            'name'                  => (string) $model->name,
            'data_nascimento'       => (string) $model->data_nascimento,
            'sexo'                  => (string) $model->sexo,
            'email'                 => (string) $model->email,
            'telefone_celular'      => (string) $model->telefone_celular,
            'telefone_fixo'      => (string) $model->telefone_fixo,
            'role'                  => (string) $model->role,
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
