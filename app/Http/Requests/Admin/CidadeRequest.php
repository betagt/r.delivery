<?php

namespace CodeDelivery\Http\Requests\Admin;

use CodeDelivery\Http\Requests\Request;

class CidadeRequest extends Request
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

    public function rules()
    {
        return [
            'nome' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'nome' => 'Cidade'
        ];
    }
}
