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
            "message" => "Serviço cadastrado com sucesso",
            "data" => $cliente
        ],200);
}

public function excluir($id){
    $usuario = Cliente::find($id);

    if(!isset($usuario)){
    return response()->json([
        'status' => false,
        'message' => "Cliente não encontrado"
    ]);
}

$usuario->delete();

return response()->json([
    'status'=> false,
    'message' => "Cliente excliuído com sucesso"
]);
}

public function update(Request $request){
$usuario = Cliente::find($request->id);

if(!isset($usuario)){
    return response()->json([
        'status' => false,
        'message' => "Cliente não encontrado"
    ]);
}

if(isset($request->nome)){
$usuario->nome = $request->nome;
}

if(isset($request->celular)){
$usuario->celular = $request->celular;
}

if(isset($request->email)){
$usuario->email = $request->email;
}

if(isset($request->cpf)){
$usuario->cpf = $request->cpf;
}

if(isset($request->dataNascimento)){
    $usuario->dataNascimento = $request->dataNascimento;
}

if(isset($request->cidade)){
    $usuario->cidade = $request->cidade;
}

if(isset($request->estado)){
    $usuario->estado = $request->estado;
}

if(isset($request->pais)){
    $usuario->pais = $request->pais;
}

if(isset($request->rua)){
    $usuario->rua = $request->rua;
}

if(isset($request->numero)){
    $usuario->numero = $request->numero;
}

if(isset($request->bairro)){
    $usuario->bairro = $request->bairro;
}

if(isset($request->cep)){
    $usuario->cep = $request->cep;
}

if(isset($request->complemento)){
    $usuario->complemento = $request->complemento;
}

if(isset($request->password)){
    $usuario->password = $request->password;
}

$usuario->update();

return response()->json([
    'status' => true,
    'message' => "Cliente atualizado"
]);
}

public function pesquisarPorNome(Request $request){
    $usuarios = Cliente::where('nome', 'like', '%'.$request->nome.'%')->get();

if(count($usuarios) > 0){

    return response()->json([
        'status' => true,
        'data' => $usuarios
    ]);
}
    return response()->json([
    'status'=> false,
    'message' => "Não há resultado para pesquisa"
]);
}

public function pesquisarPorCpf(Request $request){
    $usuarios = Cliente::where('cpf', 'like', '%'.$request->cpf.'%')->get();

if(count($usuarios) > 0){

    return response()->json([
        'status' => true,
        'data' => $usuarios
    ]);
}
    return response()->json([
    'status'=> false,
    'message' => "Não há resultado para pesquisa"
]);
}

public function pesquisarPorCelular(Request $request){
    $usuarios = Cliente::where('celular', 'like', '%'.$request->celular.'%')->get();

if(count($usuarios) > 0){

    return response()->json([
        'status' => true,
        'data' => $usuarios
    ]);
}
    return response()->json([
    'status'=> false,
    'message' => "Não há resultado para pesquisa"
]);
}

public function pesquisarPorEmail(Request $request){
    $usuarios = Cliente::where('email', 'like', '%'.$request->email.'%')->get();

if(count($usuarios) > 0){

    return response()->json([
        'status' => true,
        'data' => $usuarios
    ]);
}
    return response()->json([
    'status'=> false,
    'message' => "Não há resultado para pesquisa"
]);
}
}
