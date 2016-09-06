<?php

namespace CodeDelivery\Http\Requests;

class AdminOrderAvaliacaoRequest extends Request
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
            'order_id' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'order_id' => 'Número do Pedido',
        ];
    }
}
