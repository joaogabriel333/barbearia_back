<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfissionalFormRequest;
use App\Http\Requests\ProfissionalFormRequestUpdate;
use App\Models\AgendaProfissionais;
use App\Models\Profissional;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Profissionalcontroller extends Controller
{
    public function profissionais(ProfissionalFormRequest $request){
        $profissional= Profissional::create([
            'nome'=> $request ->nome,
            'celular'=> $request ->celular,
            'email'=> $request ->email,
            'cpf'=> $request ->cpf,
            'dataDeNascimento'=> $request ->dataDeNascimento,
            'cidade'=> $request ->cidade,
            'estado'=> $request ->estado,
            'pais'=> $request ->pais,
            'rua'=> $request ->rua,
            'numero'=> $request ->numero,
            'bairro'=> $request ->bairro,
            'cep'=> $request ->cep,
            'complemento'=> $request ->complemento,
            'senha'=> Hash::make($request->senha),
            'salario'=> $request ->salario,
        ]);

        return response()->json([
            "success" => true,
            "message" => "profissional cadastrado com sucesso",
            "data" => $profissional
        ], 200);
}
public function retornarTodos(){
    $profissional = Profissional::all();
    return response()->json([
        'status'=> true,
        'data'=> $profissional
    ]);
}
public function redefinirSenha(Request $request){
    $profissional = Profissional::where('email', $request->email)->first();
    if (!isset($profissional)){
        return response()->json([
            'status' => false,
            'message' => "Cliente não encontrado"
        ]);
    }

    $SenhaNova = $request->SenhaNova;
    $profissional->senha = Hash::make($SenhaNova);
    $profissional->update();    

    return response()->json([
        'status' => false,
        'message' => "Sua senha foi atualizada"
    ]);
}
public function pesquisarPorId($id){
    $profissional = Profissional::find($id);
    if($profissional == null){
        return response()->json([
            'status'=> false,
            'message' => "Serviço não encontrado"
        ]);     
    }
    return response()->json([
        'status'=> true,
        'data'=> $profissional
    ]);
}

public function pesquisarPorNome(Request $request){
    $profissional =  Profissional::where('nome', 'like', '%'. $request->nome . '%')->get();
    if(count($profissional) > 0){
    return response()->json([
        'status'=> true,
        'data'=> $profissional
    ]);
}
return response()->json([
    'status' => false,
    'message' => 'não há resultados para pesquisa.'
]);
}

public function pesquisarPorCpf(Request $request){
    $profissional =  Profissional::where('cpf', 'like', '%'. $request->cpf . '%')->get();
    if(count($profissional) > 0){
    return response()->json([
        'status'=> true,
        'data'=> $profissional 
    ]);
}
return response()->json([
    'status' => false,
    'message' => 'não há resultados para pesquisa.'
]);
}
public function pesquisarPorCelular(Request $request){
    $profissional =  Profissional::where('celular', 'like', '%'. $request->celular . '%')->get();

    if(count($profissional) > 0){
    return response()->json([
        'status'=> true,
        'data'=> $profissional
    ]);
}
return response()->json([
    'status' => false,
    'message' => 'não há resultados para pesquisa.'
]);
}
public function pesquisarPorEmail(Request $request){
    $profissional =  Profissional::where('email', 'like', '%'. $request->email . '%')->get();

    if(count($profissional) > 0){
    return response()->json([
        'status'=> true,
        'data'=> $profissional
    ]);
}
return response()->json([
    'status' => false,
    'message' => 'não há resultados para pesquisa.'
]);
}

public function excluir($id){
    $profissional = Profissional::find($id);
    if(!isset($profissional)){
        return response()->json([
            "status" => false,
            "message" => "profissional não encontrado"
        ]);
    }
    $profissional_agendamento = AgendaProfissionais::where('profissional_id', $id)->get(); 
        if(count($profissional_agendamento) > 0){ 
            return response()->json([
                'status' => false, 
                'message' => 'Não foi possível excluir pois o profissional possui agendamentos registrados.'
            ]);
        }
    $profissional->delete();

    return response()->json([
        'status' => false,
        'message' => 'profissional excluido com sucesso'
    ]);
}

public function update(ProfissionalFormRequestUpdate $request){
    $profissional = Profissional::find($request->id);

    if(!isset($profissional)){
        return response()->json([
            "status" => false,
            "message" => "profissional não encontrado"
        ]);
    }

    if(isset($request->nome)){
        $profissional->nome = $request->nome;
    }
    if(isset($request->celular)){
        $profissional->celular = $request->celular;
    }
    if(isset($request->email)){
        $profissional->email = $request->email;
    }
    if(isset($request->cpf)){
        $profissional->cpf= $request->cpf;
    }
    if(isset($request->dataDeNascimento)){
        $profissional->dataDeNascimento = $request->dataDeNascimento;
    }
    if(isset($request->cidade)){
        $profissional->cidade = $request->cidade;
    }
    if(isset($request->estado)){
        $profissional->estado = $request->estado;
    }
    if(isset($request->pais)){
        $profissional->pais = $request->pais;
    }
    if(isset($request->rua)){
        $profissional->rua = $request->rua;
    }
    if(isset($request->numero)){
        $profissional->numero = $request->numero;
    }
    if(isset($request->bairro)){
        $profissional->bairro = $request->bairro;
    }
    if(isset($request->cep)){
        $profissional->cep = $request->cep;
    }
    if(isset($request->complemento)){
        $profissional->complemento = $request->complemento;
    }
    if(isset($request->senha)){
        $profissional->senha = $request->senha;
    }
    if(isset($request->salario)){
        $profissional->salario = $request->salario;
    }

    $profissional->update();

    return response()->json([
        "status" => false,
        "message" => "profissional atualizado"
    ]);
}
}
