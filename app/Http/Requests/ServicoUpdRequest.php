<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ServicoRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'nome' => 'max:80|min:5',
            'descricao' => 'max:200|min:10|',
            'duracao' => 'numeric',
            'preco' => 'decimal:2'
        ];
    }

public function failedValidation(Validator $validator){
    throw new HttpResponseException(response()->json([
        'sccess' => false,
        'error' => $validator->errors()
    ]));
}

public function messages()
{
    return [
        'nome.max' => 'O campo nome deve conter no máximo 80 caracteres',
        'nome.min' => 'O campo nome deve conter no mínimo 5 caracteres',
       
        'descricao.max' => 'A descrição deve conter no máximo 200 caracteres',
        'descricao.min' => 'A descrição deve conter no mínimo 10 caracteres',

        'duracao.numeric' => 'A duração deve ser em minutos. Ex: 60 = 1 hora',

        'preco.decimal' => 'O campo preço deve ser numérico com 2 casas decimais.',

    ];
}
}