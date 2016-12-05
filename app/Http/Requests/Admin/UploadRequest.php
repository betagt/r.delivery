<?php

namespace CodeDelivery\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UploadRequest extends FormRequest
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
            'imagem' => 'mimes:jpeg,png'
        ];
    }

    public function attributes()
    {
        return [
            'imagem' => 'Foto'
        ];
    }
}
