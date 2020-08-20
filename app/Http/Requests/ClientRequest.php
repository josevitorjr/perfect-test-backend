<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(){
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(){
        return [
            'name'=>'required',
            'email'=>'required|email:rfc,dns',
            'cpf'=>'required|numeric'
        ];
    }
    public function messages(){
        return [            
            'name.required' => 'O campo nome do produto é obrigatório.',
            'email.required' => 'O campo e-mail é obrigatório.',
            'email.email' => 'O campo e-mail não contém um endereço de email válido.',
            'cpf.required' => 'O campo cpf é obrigatório.',
            'cpf.numeric' => 'O campo cpf deve conter um valor numérico.',
        ];
    }
}
