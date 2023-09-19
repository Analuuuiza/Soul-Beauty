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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
                'nome' => 'required|max:120|min:5',
                'celular' => 'required|max:11|min:10',
                'email' => 'required|email|max:120|unique:clientes,email',
                'cpf' => 'required|max:11|min:11|unique:clientes,cpf',
                'dataNascimento' => 'required',
                'cidade' => 'required|max:120',
                'estado' => 'required|max:2|min:2',
                'pais' => 'required|max:80',
                'rua' => 'required|max:120',
                'numero' => 'required|max:10',
                'bairro' => 'required|max:100',
                'cep' => 'required|max:8|min:8',
                'complemento' => 'max:150',
                'password' => 'required'
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
        'nome.required' => 'O nome é obrigatório',
        'nome.max' => 'O nome deve conter no máximo 120 caracteres',
        'nome.min' => 'O nome deve conter no mínimo 5 caracteres',
        'celular.required' => 'O celular é obrigatório',
        'celular.max' => 'O celular deve conter no máximo 11 caracteres',
        'celular.min' => 'O celular deve conter no mínimo 10 caracteres',
        'email.required' => 'O email é obrigatória',
        'email.max' => 'O email deve conter no máximo 120 caracteres',
        'email.email' => 'O formato do email é inválido',
        'cpf.required' => 'O cpf é obrigatório',
        'cpf.max' => 'O cpf deve conter no máximo 11 caracteres',
        'dataNascimento.required' => 'A data de nascimento é obrigatória',
        'dataNascimento.date' => 'A data de nascimento deve ser preenchida corretamente. (Ex: Ano/Mês/Dia)',
        'cidade.required' => 'A cidade é obrigatória',
        'cidade.max' => 'A cidade deve conter no máximo 120 caracteres',
        'estado.required' => 'O estado é obrigatório',
        'estado.max' => 'O estado deve conter no máximo 2 caracteres',
        'estado.min' => 'O estado deve conter no mínimo 2 caracteres',
        'pais.required' => 'O país deve ser obrigatório',
        'pais.max' => 'O país deve conter no máximo 80 caracteres',
        'rua.required' => 'A rua é obrigatória',
        'rua.max' => 'A rua deve conter no máximo 120 caracteres',
        'numero.required' => 'O número é obrigatório',
        'numero.max' => 'O número deve conter no máximo 10 caracteres',
        'bairro.required' => 'O bairro é obrigatório',
        'bairro.max' => 'O bairro deve conter no máximo 100 caracteres',
        'cep.required' => 'O CEP é obrigatório',
        'cep.max' => 'O CEP deve conter no máximo 8 caracteres',
        'cep.min' => 'O CEP deve conter no mínimo 8 caracteres',
        'complemento' => 'O complemento deve conter no máximo 150 caracteres',
        'password.required' => 'A senha é obrigatória',
    ];
}
   
}
