<?php

namespace CodeDelivery\Http\Requests\Admin;

use CodeDelivery\Http\Requests\Request;

class UserRequest extends Request
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
            'name' => 'required|min:3|max:125',
            'cpf' => 'required',
            'data_nascimento' => 'required',
            'email' => 'required|email',
            'telefone_celular' => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Nome',
            'cpf' => 'CPF',
            'data_nascimento' => 'Data de Nascimento',
            'email' => 'E-mail',
            'telefone_celular' => 'Telefone Celular'
        ];
    }
}
