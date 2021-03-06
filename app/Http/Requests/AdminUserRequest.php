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
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if ($this->method() == 'PUT')
        {
            $rules = [
                'name' => 'required|min:3|max:255',
                'data_nascimento' => 'required',
                'telefone_celular' => 'required',
                'cpf' => 'required',
            ];
        } else {
            $rules = [
                'name' => 'required|min:3|max:255',
                'cpf' => 'required',
                'email' => 'required|email|max:255|unique:users',
                'data_nascimento' => 'required',
                'telefone_celular' => 'required',
                'password' => 'required|min:6|confirmed',
            ];
        }
        return $rules;
    }

    public function attributes()
    {
        return [
            'name' => 'Nome',
            'cpf' => 'CPF',
            'data_nascimento' => 'Data de Nascimento',
            'email' => 'E-mail',
            'telefone_celular' => 'Celular',
            'password' => 'Senha',
        ];
    }
}
