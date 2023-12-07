<?php

namespace App\Http\Controllers;

use App\Http\Requests\AgendaRequest;
use App\Models\Agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function store(AgendaRequest $request){
        $agenda = Agenda::create([
            'profissional_id' => $request->profissional_id,
            'data_hora' => $request->data_hora
        ]);

        return response()->json([
            "success" => true,
            "message" => "Compromisso foi cadastrado na agenda com sucesso.",
            "data" => $agenda
        ], 200);
}

public function pesquisarPorAgenda(Request $request)
    {
        $agendas = Agenda::where('data_hora', '>=', $request->data_hora)->where('profissional_id', '=',  $request->profissional_id)->get();

        if (count($agendas) > 0) {
            return response()->json([
                'status' => true,
                'data' => $agendas
            ]);
        }
        return response()->json([
            'status' => false,
            'data' => 'Não há resultados para a pesquisa.'
        ]);
    }

public function excluirAgenda($id){
    $agenda = Agenda::find($id);

    if(!isset($agenda)){
        return response()->json([
            'status' => false,
            'message' => "Compromisso não encontrado na agenda."
        ]);
    }

    $agenda->delete();
    return response()->json([
        'status' => true,
        'message' => "Compromisso excluído da agenda com sucesso."
    ]);
}
public function updateAgenda(Request $request){
    $agenda = Agenda::find($request->id);
    if (!isset($agenda)){
        return response()->json([
            'status' => false,
            'message' => "Compromisso não encontrado na agenda"
        ]);
    }

    if(isset($request->profissional)){
        $agenda->profissional_id = $request->profissional_id;
    }

    if(isset($request->cliente)){
        $agenda->cliente_id = $request->cliente_id;
    }

    if(isset($request->data_hora)){
        $agenda->data_hora = $request->data_hora;
    }

    if(isset($request->tipo_pagamento)){
        $agenda->tipo_pagamento = $request->tipo_pagamento;
    }

    if(isset($request->valor)){
        $agenda->valor = $request->valor;
    }

    $agenda->update();
    return response()->json([
        'status' => true,
        'message' => "Compromisso atualizado."
    ]);
}
public function retornarTodos(){
    $agendas = Agenda::all();

    return response()->json([
        'status' => true,
        'data' => $agendas
    ]);
}
}
