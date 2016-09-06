<?php

namespace CodeDelivery\Http\Requests;

class AdminClientRequest extends Request
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
        $validation = 'required|email|max:255|unique:users';
        if ($this->method() == 'PUT')
        {
            $validation = 'required|email|max:255|unique:users,id,' . $this->get('id');
        }

        return [
            'user[name]' => 'required|min:3|max:255',
            'user[email]' => $validation,
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zipcode' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'user[name]' => 'Nome',
            'user[email]' => 'E-mail',
            'phone' => 'Telefone',
            'address' => 'Endereço',
            'city' => 'Cidade',
            'state' => 'Estado',
            'zipcode' => 'CEP',
        ];
    }
}
