<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ClienteRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|string>
     */
    public function rules(): array
    {
        return [
                'nome' => 'max:120|min:5',
                'celular' => 'max:11|min:10',
                'email' => 'email|max:120',
                'cpf' => 'max:11|min:11',
                'dataNascimento' => 'date',
                'cidade' => 'max:120',
                'estado' => 'max:2|min:2',
                'pais' => 'max:80',
                'rua' => 'max:120',
                'numero' => 'max:10',
                'bairro' => 'max:100',
                'cep' => 'max:8|min:8',
                'complemento' => 'max:150',
                'password' => ''
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
        'nome.max' => 'O nome deve conter no máximo 120 caracteres',
        'nome.min' => 'O nome deve conter no mínimo 5 caracteres',
        'celular.max' => 'O celular deve conter no máximo 11 caracteres',
        'celular.min' => 'O celular deve conter no mínimo 10 caracteres',
        'email.max' => 'O email deve conter no máximo 120 caracteres',
        'email.email' => 'O formato do email é inválido',
        'cpf.max' => 'O cpf deve conter no máximo 11 caracteres',
        'dataNascimento.date' => 'A data de nascimento deve ser preenchida corretamente. (Ex: Ano/Mês/Dia)',
        'cidade.max' => 'A cidade deve conter no máximo 120 caracteres',
        'estado.max' => 'O estado deve conter no máximo 2 caracteres',
        'estado.min' => 'O estado deve conter no mínimo 2 caracteres',
        'pais.max' => 'O país deve conter no máximo 80 caracteres',
        'rua.max' => 'A rua deve conter no máximo 120 caracteres',
        'numero.max' => 'O número deve conter no máximo 10 caracteres',
        'bairro.max' => 'O bairro deve conter no máximo 100 caracteres',
        'cep.max' => 'O CEP deve conter no máximo 8 caracteres',
        'cep.min' => 'O CEP deve conter no mínimo 8 caracteres',
        'complemento.max' => 'O complemento deve conter no máximo 150 caracteres',
    ];
}
   
}