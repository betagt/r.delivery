<?php

namespace CodeDelivery\Http\Requests;

use CodeDelivery\Http\Requests\Request;

class CheckoutContatoRequest extends Request
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
            'assunto' => 'required|min:3|max:200',
            'mensagem' => 'required|min:3|max:500'
        ];
    }

    public function attributes()
    {
        return [
            'assunto' => 'Assunto',
            'mensagem' => 'Mensagem'
        ];
    }
}
