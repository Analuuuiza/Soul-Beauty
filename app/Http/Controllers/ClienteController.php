<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteRequest;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClienteController extends Controller

{
    public function store(ClienteRequest $request){
        $cliente = Cliente::create([
            'nome' => $request->nome,
            'celular' => $request->celular,
            'email' => $request->email,
            'cpf' => $request->cpf,
            'dataNascimento' => $request->dataNascimento,
            'cidade' => $request->cidade,
            'estado' => $request->estado,
            'pais' => $request->pais,
            'rua' => $request->rua,
            'numero' => $request->numero,
            'bairro' => $request->bairro,
            'cep' => $request->cep,
            'complemento' => $request->complemento,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            "sucess" => true,
            "message" => "Cliente cadastrado com sucesso",
            "data" => $cliente
        ],200);
}

public function excluir($id){
    $cliente = Cliente::find($id);

    if(!isset($cliente)){
    return response()->json([
        'status' => false,
        'message' => "Cliente não encontrado"
    ]);
}

$cliente->delete();

return response()->json([
    'status'=> false,
    'message' => "Cliente excliuído com sucesso"
]);
}

public function update(Request $request){
$cliente = Cliente::find($request->id);

if(!isset($cliente)){
    return response()->json([
        'status' => false,
        'message' => "Cliente não encontrado"
    ]);
}

if(isset($request->nome)){
$cliente->nome = $request->nome;
}

if(isset($request->celular)){
$cliente->celular = $request->celular;
}

if(isset($request->email)){
$cliente->email = $request->email;
}

if(isset($request->cpf)){
$cliente->cpf = $request->cpf;
}

if(isset($request->dataNascimento)){
    $cliente->dataNascimento = $request->dataNascimento;
}

if(isset($request->cidade)){
    $cliente->cidade = $request->cidade;
}

if(isset($request->estado)){
    $cliente->estado = $request->estado;
}

if(isset($request->pais)){
    $cliente->pais = $request->pais;
}

if(isset($request->rua)){
    $cliente->rua = $request->rua;
}

if(isset($request->numero)){
    $cliente->numero = $request->numero;
}

if(isset($request->bairro)){
    $cliente->bairro = $request->bairro;
}

if(isset($request->cep)){
    $cliente->cep = $request->cep;
}

if(isset($request->complemento)){
    $cliente->complemento = $request->complemento;
}

if(isset($request->password)){
    $cliente->password = $request->password;
}

$cliente->update();

return response()->json([
    'status' => true,
    'message' => "Cliente atualizado"
]);
}

public function pesquisarPorNome(Request $request){
    $clientes = Cliente::where('nome', 'like', '%'.$request->nome.'%')->get();

if(count($clientes) > 0){

    return response()->json([
        'status' => true,
        'data' => $clientes
    ]);
}
    return response()->json([
    'status'=> false,
    'message' => "Não há resultado para pesquisa"
]);
}

public function pesquisarPorCpf(Request $request){
    $clientes = Cliente::where('cpf', 'like', '%'.$request->cpf.'%')->get();

if(count($clientes) > 0){

    return response()->json([
        'status' => true,
        'data' => $clientes
    ]);
}
    return response()->json([
    'status'=> false,
    'message' => "Não há resultado para pesquisa"
]);
}

public function pesquisarPorCelular(Request $request){
    $clientes = Cliente::where('celular', 'like', '%'.$request->celular.'%')->get();

if(count($clientes) > 0){

    return response()->json([
        'status' => true,
        'data' => $clientes
    ]);
}
    return response()->json([
    'status'=> false,
    'message' => "Não há resultado para pesquisa"
]);
}

public function pesquisarPorEmail(Request $request){
    $clientes = Cliente::where('email', 'like', '%'.$request->email.'%')->get();

if(count($clientes) > 0){

    return response()->json([
        'status' => true,
        'data' => $clientes
    ]);
}
    return response()->json([
    'status'=> false,
    'message' => "Não há resultado para pesquisa"
]);
}
}
