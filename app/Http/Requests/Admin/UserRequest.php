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
        $validationCpf = 'required|max:255|unique:users';
        $validationEmail = 'required|cpf|email|max:255|unique:users';
        if ($this->method() == 'PUT')
        {
            $validationCpf = 'required|max:255|unique:users,cpf,' . $this->get('id');
            $validationEmail = 'required|email|max:255|unique:users,id,' . $this->get('id');
        }

        return [
            "name" => 'required|min:3|max:255',
            'cpf' => $validationCpf,
            "email" => $validationEmail,
            'data_nascimento' => 'required',
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
