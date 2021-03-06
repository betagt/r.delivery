<?php

namespace CodeDelivery\Http\Requests;



use Illuminate\Http\Request as NRequest;

class CheckoutRequest extends Request
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
    public function rules(NRequest $request)
    {
        $rules = [
            'cupom_code' => 'exists:cupoms,code,used,0',
            'user_address_id' => 'require',
        ];

        $this->buildRulesItems(0, $rules);
        $items = $request->get('items', []);
        $items = (!is_array($items) ? [] : $items);

        foreach ($items as $key => $val) {
            $this->buildRulesItems($key, $rules);
        }

        return $rules;
    }

    public function buildRulesItems($key, array &$rules)
    {
        $rules["items.$key.product_id"] = 'required';
        $rules["items.$key.qtd"] = 'required';
    }

    public function attributes()
    {
        $attribute = [
            'cupom_code' => 'Código do Cupom',
            'user_address_id' => 'Endereço de Entreta',
        ];
        foreach($this->request->get('items') as $key => $val)
        {
            $attribute['items.'.$key.'.product_id'] = "Código do Produto na linha {$key}";
            $attribute['items.'.$key.'.qtd'] = "Quantidade do Produto na linha {$key}";
        }
        return $attribute;
    }
}
