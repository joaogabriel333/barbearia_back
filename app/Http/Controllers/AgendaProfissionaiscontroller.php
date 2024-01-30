<?php

namespace App\Http\Controllers;

use App\Http\Requests\AgendaFormRequest;
use Carbon\Carbon;
use App\Http\Requests\AgendaProfissionaisFormRequest;
use App\Models\AgendaProfissionais;
use DateTime;

use Illuminate\Http\Request;

class AgendaProfissionaiscontroller extends Controller
{

    public function cadastroAgenda(AgendaProfissionaisFormRequest $request)
    {
        $dataHora = new DateTime($request->dataHora);
        $dataAtual = Carbon::now('America/Sao_Paulo');
        if ($dataHora < $dataAtual) {
            return response()->json([
                "success" => false,
                "message" => "Não é possível cadastrar um horário antes do dia atual"
            ], 400);
        }

        $agendamento =AgendaProfissionais::create([
           
            'profissional_id' => $request->profissional_id,
            'dataHora' => $request->dataHora 
            
        ]);
        return response()->json([
            "success" => true,
            "message" => "Agenda cadastrado com sucesso",
            "data" => $agendamento
        ], 200);
    }

    //visualizar todos
    public function retornarTodos(){
        $agendamento = AgendaProfissionais::all();
        return response()->json([
            'status'=> true,
            'data'=> $agendamento
        ]);
    }


    public function pesquisarPorId($id){
        $agendamento = AgendaProfissionais::find($id);
        if($agendamento == null){
            return response()->json([
                'status'=> false,
                'message' => "agendamento não encontrado"
            ]);     
        }
        return response()->json([
            'status'=> true,
            'data'=> $agendamento
        ]);
    }

//pesquisar por data
public function pesquisarPorAgendamento(Request $request){
    $agendamento = AgendaProfissionais::where('profissional_id', 'like', '%' . $request->profissional_id . '%')->get();
    if (count($agendamento) > 0) {
        return response()->json([
            'status' => true,
            'data' => $agendamento
        ]);
    }
    return response()->json([
        'status' => false,
        'data' => "Servico não encontrado"
    ]);
}

//pesquisar por Profissionais
public function pesquisarPorProfissional(Request $request){
    $agendamento =  AgendaProfissionais::where('profissional_id', 'like', '%'. $request->profissional_id . '%')->get();
    if(count($agendamento) > 0){
    return response()->json([
        'status'=> true,
        'data'=> $agendamento
    ]);
}
return response()->json([
    'status' => false,
    'message' => 'não há resultados para pesquisa.'
]);
}

    //DELETANDO AGENDAMENTO 
    public function excluir($id){
        $agendamento= AgendaProfissionais::find($id);
        if (!isset($agendamento)) {
            return response()->json([
                'status' => false,
                'message' => "Agendamento não encontrado"
            ]);
        }

        $agendamento->delete();

        return response()->json(([
            'status' => true,
            'message' =>  "Agendamento excluido com sucesso"
        ]));
    }


    //EDITANDO O AGENDAMENTO
    public function update(AgendaProfissionaisFormRequest $request){
        $agendamento = AgendaProfissionais::find($request->id);

        $dataHoraAgendamento = new DateTime($request->dataHora);
        $dataAtual = Carbon::now('America/Sao_Paulo');
    
        if ($dataHoraAgendamento < $dataAtual) {
            return response()->json([
                "success" => false,
                "message" => "Não é possível cadastrar um horário antes do dia atual"
            ], 400);
        }
    
        if(!isset($agendamento)){
            return response()->json([
                "status" => false,
                "message" => "Agendamento não encontrado"
            ]);
        }
    
        if(isset($request->profissional_id)){
            $agendamento->profissional_id = $request->profissional_id;
        }
        if(isset($request->dataHora)){
            $agendamento->dataHora = $request->dataHora;
        }
        $agendamento->update();
    
        return response()->json([
            "status" => false,
            "message" => "agendamento atualizado"
        ]);
    }
}
