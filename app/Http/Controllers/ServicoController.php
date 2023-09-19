<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServicoRequest;
use App\Models\Servico;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;

class ServicoController extends Controller
{
    public function store( ServicoRequest $request){
        $usuario = Servico::create([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'duracao' => $request->duracao,
            'preco' => $request->preco,
        ]);

        return response()->json([
            "success" => true,
            "message" => "Serviço cadastrado com sucesso",
            "data" => $usuario
        ], 200);
}
    public function excluir($id){
        $usuario = Servico::find($id);

        if(!isset($usuario)){
        return response()->json([
            'status' => false,
            'message' => "Serviço não encontrado"
        ]);
    }

    $usuario->delete();

    return response()->json([
        'status'=> false,
        'message' => "Serviço excliuído com sucesso"
]);
}

public function update(Request $request){
    $usuario = Servico::find($request->id);

    if(!isset($usuario)){
        return response()->json([
            'status' => false,
            'message' => "Serviço não encontrado"
        ]);
    }

    if(isset($request->nome)){
    $usuario->nome = $request->nome;
    }

    if(isset($request->descricao)){
    $usuario->descricao = $request->descricao;
    }

    if(isset($request->duracao)){
    $usuario->duracao = $request->duracao;
    }

    if(isset($request->preco)){
    $usuario->preco = $request->preco;
    }

    $usuario->update();

    return response()->json([
        'status' => true,
        'message' => "Serviço atualizado"
    ]);
}

public function pesquisarPorNome(Request $request){
    $usuarios = Servico::where('nome', 'like', '%'.$request->nome.'%')->get();

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
public function pesquisarPorDescricao($descricao){
    $usuario = Servico::where('descricao', $descricao)->first();
    if($usuario == null){
    return response()->json([
        'status'=> true,
        'message' => "Serviço não encontrado"
    ]);
}
return response()->json([
    'status' => true,
    'data' => $usuario
    ]);
}
}
