<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ServicoUpdRequest extends FormRequest
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
            'nome' => 'required|max:80|min:5|unique:servicos,nome',
            'descricao' => 'required|max:200|min:10|',
            'duracao' => 'required|numeric',
            'preco' => 'required|decimal:2'
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
        'nome.required' => 'O campo nome é obrigatório',
        'nome.max' => 'O campo nome deve conter no máximo 80 caracteres',
        'nome.min' => 'O campo nome deve conter no mínimo 5 caracteres',
        'nome.unique' => 'O nome já foi cadastrado no sistema',
        'descricao.max' => 'A descrição deve conter no máximo 200 caracteres',
        'descricao.min' => 'A descrição deve conter no mínimo 10 caracteres',
        'duracao.numeric' => 'A duração deve ser em minutos. Ex: 60 = 1 hora',
        'duracao.required' => 'A duração é obrigatória',
        'preco.decimal' => 'O campo preço deve ser numérico com 2 casas decimais.',
        'preco.required' => 'O preço é obrigatório'

    ];
}
}