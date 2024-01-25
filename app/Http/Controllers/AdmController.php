<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdmFormRequest;
use App\Http\Requests\AdmFormRequestUpdate;
use App\Models\Adm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdmController extends Controller
{
    public function adms(AdmFormRequest $request){
        $Adm= Adm::create([
    'nome'=> $request ->nome,
    'email'=> $request ->email,
    'cpf'=> $request ->cpf,
    'senha'=> Hash::make($request->senha),
    
]);
    
return response()->json([
    "success" => true,
    "message" => "Adm cadastrado com sucesso",
    "data" => $Adm
], 200);
}
public function retornarTodos(){
    $Adm = Adm::all();
    return response()->json([
        'status'=> true,
        'data'=> $Adm
    ]);
}
public function redefinirSenha(Request $request){
    $Adm = Adm::where('email', $request->email)->first();
    if (!isset($Adm)){
        return response()->json([
            'status' => false,
            'message' => "Adm não encontrado"
        ]);
    }

    $Adm->senha = Hash::make($Adm->cpf);
    $Adm->update();    

    return response()->json([
        'status' => false,
        'message' => "Sua senha foi atualizada"
    ]);
}
public function pesquisarPorId($id){
    $Adm = Adm::find($id);
    if($Adm == null){
        return response()->json([
            'status'=> false,
            'message' => "Id não encontrado"
        ]);     
    }
    return response()->json([
        'status'=> true,
        'data'=> $Adm
    ]);
}
public function pesquisarPorNome(Request $request){
    $Adm =  Adm::where('nome', 'like', '%'. $request->nome . '%')->get();
    if(count($Adm) > 0){
    return response()->json([
        'status'=> true,
        'data'=> $Adm
    ]);
}
return response()->json([
    'status' => false,
    'message' => 'não há resultados para pesquisa.'
]);
}

public function pesquisarPorCpf(Request $request){
    $Adm =  Adm::where('cpf', 'like', '%'. $request->cpf . '%')->get();
    if(count($Adm) > 0){
    return response()->json([
        'status'=> true,
        'data'=> $Adm 
    ]);
}
return response()->json([
    'status' => false,
    'message' => 'não há resultados para pesquisa.'
]);
}
public function pesquisarPorEmail(Request $request){
    $Adm =  Adm::where('email', 'like', '%'. $request->email . '%')->get();
    if(count($Adm) > 0){
    return response()->json([
        'status'=> true,
        'data'=> $Adm
    ]);
}
return response()->json([
    'status' => false,
    'message' => 'não há resultados para pesquisa.'
]);
}

public function excluir($id){
    $Adm = Adm::find($id);
    if(!isset($Adm)){
        return response()->json([
            "status" => false,
            "message" => "Adm não encontrado"
        ]);
    }
    $Adm->delete();

    return response()->json([
        'status' => false,
        'message' => 'Adm excluido com sucesso'
    ]);
}

public function update(AdmFormRequestUpdate $request){
    $Adm = Adm::find($request->id);

    if(!isset($Adm)){
        return response()->json([
            "status" => false,
            "message" => "Adm não encontrado"
        ]);
    }
    if(isset($request->nome)){
        $Adm->nome = $request->nome;
    }
if(isset($request->email)){
        $Adm->email = $request->email;
    }
if(isset($request->cpf)){
        $Adm->cpf= $request->cpf;
    }
if(isset($request->senha)){
        $Adm->senha = $request->senha;
    }

    $Adm->update();

    return response()->json([
        "status" => false,
        "message" => "Adm atualizado"
    ]);
}
}
