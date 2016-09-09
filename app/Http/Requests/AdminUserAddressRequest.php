<?php

namespace CodeDelivery\Http\Requests;

use CodeDelivery\Http\Requests\Request;

class AdminUserAddressRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'address' => 'required|min:3|max:255',
            'number' => 'required|max:255',
            'neighborhood' => 'required|min:3|max:255',
            'city' => 'required|min:3|max:255',
            'state' => 'required|min:2|max:255',
            'zipcode' => 'required|min:3|max:255',
        ];
    }

    public function attributes()
    {
        return [
            'address' => 'Endereço',
            'number' => 'Número',
            'neighborhood' => 'Bairro',
            'city' => 'Cidade',
            'state' => 'Estado',
            'zipcode' => 'CEP',
        ];
    }
}
