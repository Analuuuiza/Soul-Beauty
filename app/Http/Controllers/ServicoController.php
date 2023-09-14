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

    public function pesquisarPorId($id){
        $usuario = Servico::find($id);

        if($usuario == null){
        return response()->json([
            'stattus' => false,
            'message' => "Serviço não encontrado"
        ]);
    }
        return response()->json([
          'status'=> true,
          'data'=> $usuario
]);
}
}
