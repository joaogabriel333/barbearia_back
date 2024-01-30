<?php

namespace App\Http\Controllers;

use App\Http\Requests\PagamentoFormRequest;
use App\Models\Pagamento;
use Illuminate\Http\Request;

class PagamentoController extends Controller
{
    public function pagamentos(PagamentoFormRequest $request){
        $pagamento= Pagamento::create([
            'tipoDePagamento'=> $request ->tipoDePagamento,
            'taxa'=> $request ->taxa,
            'status'=> $request ->status,
       
        ]);

        return response()->json([
            "success" => true,
            "message" => "tipo de pagamento cadastrado com sucesso",
            "data" => $pagamento
        ], 200);
}

public function retornarTodos(){
    $pagamento = pagamento::all();
    if (!isset($pagamento)) {
        return response()->json([
            'status' => false,
            'message' => 'Não há registros no sistema'
        ]);
    }
    return response()->json([
        'status'=> true,
        'data'=> $pagamento
    ]);
}

public function retornarTodosHabilitados(){
    $pagamento = pagamento::where('status', 'habilitado')->get();
    if (!isset($pagamento)) {
        return response()->json([
            'status' => false,
            'message' => 'Não há registros no sistema'
        ]);
    }
    return response()->json([
        'status'=> true,
        'data'=> $pagamento
    ]);
}

public function retornarTodosDesabilitados(){
    $pagamento = pagamento::where('status', 'desabilitado')->get();
    if (!isset($pagamento)) {
        return response()->json([
            'status' => false,
            'message' => 'Não há registros no sistema'
        ]);
    }
    return response()->json([
        'status'=> true,
        'data'=> $pagamento
    ]);
}

public function pesquisarPorPagamento(Request $request){
    $pagamento =  pagamento::where('tipoDePagamento', 'like', '%'. $request->tipoDePagamento . '%')->get();
    if(count($pagamento) > 0){
    return response()->json([
        'status'=> true,
        'data'=> $pagamento
    ]);
}

return response()->json([
    'status' => false,
    'message' => 'não há resultados para pesquisa.'
]);
}

public function pesquisarPorId($id){
    $pagamento = pagamento::find($id);
    if($pagamento == null){
        return response()->json([
            'status'=> false,
            'message' => "Não encontrado"
        ]);     
    }
    return response()->json([
        'status'=> true,
        'data'=> $pagamento
    ]);
}

public function excluir($id){
    $pagamento = pagamento::find($id);
    if(!isset($pagamento)){
        return response()->json([
            "status" => false,
            "message" => "Id não encontrado"
        ]);
    }
    $pagamento->delete();

    return response()->json([
        'status' => false,
        'message' => 'Tipo de pagamento excluido com sucesso'
    ]);
}

public function update(PagamentoFormRequest $request){
    $pagamento = pagamento::find($request->id);

    if(!isset($pagamento)){
        return response()->json([
            "status" => false,
            "message" => "Serviço não encontrado"
        ]);
    }

    if(isset($request->tipoDePagamento)){
        $pagamento->tipoDePagamento = $request->tipoDePagamento;
    }
    if(isset($request->taxa)){
        $pagamento->taxa = $request->taxa;
    }
    if(isset($request->status)){
        $pagamento->status = $request->status;
    }

    $pagamento->update();

    return response()->json([
        "status" => false,
        "message" => "Tipo de Pagamento atualizado"
    ]);
}
}