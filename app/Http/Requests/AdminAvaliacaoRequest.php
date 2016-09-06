<?php

namespace CodeDelivery\Http\Requests;

use CodeDelivery\Http\Requests\Request;

class AdminAvaliacaoRequest extends Request
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
            'questao' => 'required|min:3|max:255'
        ];
    }

    public function attributes()
    {
        return [
            'questao' => 'Questão'
        ];
    }
}
