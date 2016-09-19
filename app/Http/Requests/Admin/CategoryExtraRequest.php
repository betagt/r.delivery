<?php

namespace CodeDelivery\Http\Requests\Admin;

use CodeDelivery\Http\Requests\Request;

class CategoryExtraRequest extends Request
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
            'name' => 'request|min:3|max:125'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Nome'
        ];
    }
}