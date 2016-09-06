<?php

namespace CodeDelivery\Http\Requests;

class AdminProductRequest extends Request
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
            'name'=>'required|min:3',
            'category_id'=>'required',
            'description'=>'required',
            'price'=>'required',
        ];
    }

    public function attributes()
    {
        return [
            'name'=>'Nome',
            'category_id'=>'Categoria do Produto',
            'description'=>'Descrição',
            'price'=>'Preço',
        ];
    }
}
