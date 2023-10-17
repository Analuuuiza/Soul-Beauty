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
        $servico = Servico::create([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'duracao' => $request->duracao,
            'preco' => $request->preco,
        ]);

        return response()->json([
            "success" => true,
            "message" => "Serviço cadastrado com sucesso",
            "data" => $servico
        ], 200);
}
    public function excluir($id){
        $servico = Servico::find($id);

        if(!isset($servico)){
        return response()->json([
            'status' => false,
            'message' => "Serviço não encontrado"
        ]);
    }

    $servico->delete();

    return response()->json([
        'status'=> false,
        'message' => "Serviço excliuído com sucesso"
]);
}

public function update(Request $request){
    $servico = Servico::find($request->id);

    if(!isset($servico)){
        return response()->json([
            'status' => false,
            'message' => "Serviço não encontrado"
        ]);
    }

    if(isset($request->nome)){
    $servico->nome = $request->nome;
    }

    if(isset($request->descricao)){
    $servico->descricao = $request->descricao;
    }

    if(isset($request->duracao)){
    $servico->duracao = $request->duracao;
    }

    if(isset($request->preco)){
    $servico->preco = $request->preco;
    }

    $servico->update();

    return response()->json([
        'status' => true,
        'message' => "Serviço atualizado"
    ]);
}

public function pesquisarPorNome(Request $request){
    $servicos = Servico::where('nome', 'like', '%'.$request->nome.'%')->get();

if(count($servicos) > 0){

    return response()->json([
        'status' => true,
        'data' => $servicos
    ]);
}
    return response()->json([
    'status'=> false,
    'message' => "Não há resultado para pesquisa"
]);
}
public function pesquisarPorDescricao(Request $request){
    $servicos = Servico::where('descricao', 'like', '%'.$request->descricao.'%')->get();

   if(count($servicos) > 0){
    return response()->json([
        'status' => true,
        'data' => $servicos
        ]);
    }
    return response()->json([
        'status'=> false,
        'message' => "Serviço não encontrado"
    ]);
}

}
