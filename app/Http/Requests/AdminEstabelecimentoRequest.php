<?php

namespace CodeDelivery\Http\Requests;

class AdminEstabelecimentoRequest extends Request
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
            'icone' => 'mimes:jpeg,jpg,bmp,png',
            'nome' => 'required|min:3|max:255',
            'telefone' => 'required|min:3|max:255',
            'email' => 'required|email|min:3|max:255',
        ];
    }

    public function attributes()
    {
        return [
            'icone' => 'Logomarca',
            'nome' => 'Nome',
            'telefone' => 'Telefone',
            'email' => 'E-mail'
        ];
    }
}
