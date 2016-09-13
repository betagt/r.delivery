<?php

namespace CodeDelivery\Http\Requests;

use CodeDelivery\Http\Requests\Request;

class AdminUserRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'data_nascimento' => 'required',
            'telefone_celular' => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Nome',
            'data_nascimento' => 'Data de Nascimento',
            'telefone_celular' => 'Celular'
        ];
    }
}
