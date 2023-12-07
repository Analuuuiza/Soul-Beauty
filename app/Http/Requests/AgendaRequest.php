<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class AgendaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'profissional_id' => 'required',
            'cliente_id' => '',
            'servico_id' => '',
            'data_hora' => 'required|date',
            'tipo_pagamento' => 'max:20|min:3',
            'valor' => 'decimal: 2',
        ];
    }
    public function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json([
            'success' => false,
            'error' => $validator->errors()
        ]));
    }
    public function messages()
    {
        return [
            'profissional_id.required'=> 'O campo profissional é obrigatório',
            'data_hora.required' =>'cliente obrigatório',
            'data_hora.date' => 'Formato invalido',
            'tipo_pagamento.max' => 'o campo nome deve conter no máximo 20 caracteres',
            'tipo_pagamento.min' => 'o campo nome dever conter no mínimo 3 caracteres',
           'valor.decimal:2'=> 'formato invalido'
        ];
    }
}
