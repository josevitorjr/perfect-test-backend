<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaleRequest extends FormRequest
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
            'client'=>'required|numeric',
            'product'=>'required|numeric',
            'date'=>'required',
            'quantity'=>'required',
            'discount'=>'required|numeric|max:100',
            'status'=>'required'
        ];
    }
    public function messages()
    {
        return [            
            'client.required' => 'O campo Cliente é obrigatório.',
            'product.required' => 'O campo Produto é obrigatório.',
            'client.numeric' => 'O campo Cliente é obrigatório.',
            'product.numeric' => 'O campo Produto é obrigatório.',
            'date.required' => 'O campo Data é obrigatório.',
            'quantity.required' => 'O campo Quantidade é obrigatório.',
            'discount.required' => 'O campo Desconto é obrigatório.',
            'status.required' => 'A campo Status é obrigatório.',
            'discount.numeric' => 'O Desconto aceita apenas números.',
            'discount.max' => 'O Desconto deverá ser menor que 100,00'
        ];
    }
}
