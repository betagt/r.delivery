<?php

namespace CodeDelivery\Http\Requests;

use Illuminate\Http\Request as NRequest;

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
    public function rules(NRequest $request)
    {
        $rules = [
            'order_id' => 'required',
            'mensagem' => 'require',
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
        $rules["items.$key.avaliacao_id"] = 'required';
        $rules["items.$key.nota"] = 'required';
    }

    public function attributes()
    {
        $attribute = [
            'order_id' => 'Número do Pedido',
            'mensagem' => 'Mensagem',
        ];
        foreach($this->request->get('items') as $key => $val)
        {
            $attribute['items.'.$key.'.avaliacao_id'] = "Avaliação na linha {$key}";
            $attribute['items.'.$key.'.nota'] = "Nota na linha {$key}";
        }
        return $attribute;
    }
}
