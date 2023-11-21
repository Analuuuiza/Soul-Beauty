<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class AgendaUpdateRequest extends FormRequest
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
            'profissional_id' => '',
            'cliente_id' => '',
            'servico_id' => '',
            'data_hora' => 'dateTime',
            'tipo_pagamento' => 'max:20|min:3',
            'valor' => 'decimal: 2,4',
        ];
    }
    public function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json([
            'sccess' => false,
            'error' => $validator->errors()
        ]));
    }

    public function messages(){
        return [
            'data_hora.dateTime' => 'A data e a hora deve ser preenchida corretamente. Exemplo: Ano-Mês-Dia Hora:Minuto:Segundo',
            'tipo_pagamento.max' => 'O tipo de pagamento tem um máximo de 20 caracteres',
            'tipo_pagamento.min' => 'O tipo de pagamento tem um mínimo de 3 caracteres',
            'valor.decimal' => 'O valor deve ser colocado corretamente. Exemplo: 30.00'
        ];
    }
}

