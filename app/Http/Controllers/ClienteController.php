<?php

namespace App\Http\Controllers;

use App\Http\Requests\clienteFormRequest;
use App\Http\Requests\clienteFormRequestUpdate;
use App\Models\cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class clientecontroller extends Controller
    {
    
        public function clientes(clienteFormRequest $request){
            $Cliente= cliente::create([
                'nome'=> $request ->nome,
                'celular'=> $request ->celular,
                'email'=> $request ->email,
                'cpf'=> $request ->cpf,
                'dataNascimento'=> $request ->dataNascimento,
                'cidade'=> $request ->cidade,
                'estado'=> $request ->estado,
                'pais'=> $request ->pais,
                'rua'=> $request ->rua,
                'numero'=> $request ->numero,
                'bairro'=> $request ->bairro,
                'cep'=> $request ->cep,
                'complemento'=> $request ->complemento,
                'senha'=> Hash::make($request->senha),
            ]);
    
            return response()->json([
                "success" => true,
                "message" => "Cliente cadastrado com sucesso",
                "data" => $Cliente
            ], 200);
    }
    public function retornarTodos(){
        $Cliente = cliente::all();
        return response()->json([
            'status'=> true,
            'data'=> $Cliente
        ]);
    }
    public function redefinirSenha(Request $request){
        $Cliente = cliente::where('email', $request->email)->first();
        if (!isset($Cliente)){
            return response()->json([
                'status' => false,
                'message' => "Cliente não encontrado"
            ]);
        }

        $SenhaNova = $request->SenhaNova;
        $Cliente->senha = Hash::make($SenhaNova);
        $Cliente->update();    

        return response()->json([
            'status' => false,
            'message' => "Sua senha foi atualizada"
        ]);
    }
    public function pesquisarPorId($id){
        $Cliente = cliente::find($id);
        if($Cliente == null){
            return response()->json([
                'status'=> false,
                'message' => "Serviço não encontrado"
            ]);     
        }
        return response()->json([
            'status'=> true,
            'data'=> $Cliente
        ]);
    }

    public function pesquisarPorNome(Request $request){
        $Cliente =  cliente::where('nome', 'like', '%'. $request->nome . '%')->get();
        if(count($Cliente) > 0){
        return response()->json([
            'status'=> true,
            'data'=> $Cliente
        ]);
    }
    return response()->json([
        'status' => false,
        'message' => 'não há resultados para pesquisa.'
    ]);
    }
    
    public function pesquisarPorCpf(Request $request){
        $Cliente =  cliente::where('cpf', 'like', '%'. $request->cpf . '%')->get();
        if(count($Cliente) > 0){
        return response()->json([
            'status'=> true,
            'data'=> $Cliente 
        ]);
    }
    return response()->json([
        'status' => false,
        'message' => 'não há resultados para pesquisa.'
    ]);
    }
    public function pesquisarPorCelular(Request $request){
        $Cliente =  cliente::where('celular', 'like', '%'. $request->celular . '%')->get();
        if(count($Cliente) > 0){
        return response()->json([
            'status'=> true,
            'data'=> $Cliente
        ]);
    }
    return response()->json([
        'status' => false,
        'message' => 'não há resultados para pesquisa.'
    ]);
    }
    public function pesquisarPorEmail(Request $request){
        $Cliente =  cliente::where('email', 'like', '%'. $request->email . '%')->get();
        if(count($Cliente) > 0){
        return response()->json([
            'status'=> true,
            'data'=> $Cliente
        ]);
    }
    return response()->json([
        'status' => false,
        'message' => 'não há resultados para pesquisa.'
    ]);
    }
    
    public function excluir($id){
        $Cliente = cliente::find($id);
        if(!isset($Cliente)){
            return response()->json([
                "status" => false,
                "message" => "Cliente não encontrado"
            ]);
        }
        $Cliente->delete();
    
        return response()->json([
            'status' => false,
            'message' => 'Cliente excluido com sucesso'
        ]);
    }
    
    public function update(clienteFormRequestUpdate $request){
        $Cliente = cliente::find($request->id);
    
        if(!isset($Cliente)){
            return response()->json([
                "status" => false,
                "message" => "Cliente não encontrado"
            ]);
        }
    
        if(isset($request->nome)){
            $Cliente->nome = $request->nome;
        }
        if(isset($request->celular)){
            $Cliente->celular = $request->celular;
        }
        if(isset($request->email)){
            $Cliente->email = $request->email;
        }
        if(isset($request->cpf)){
            $Cliente->cpf= $request->cpf;
        }
        if(isset($request->dataNascimento)){
            $Cliente->dataNascimento = $request->dataNascimento;
        }
        if(isset($request->cidade)){
            $Cliente->cidade = $request->cidade;
        }
        if(isset($request->estado)){
            $Cliente->estado = $request->estado;
        }
        if(isset($request->pais)){
            $Cliente->pais = $request->pais;
        }
        if(isset($request->rua)){
            $Cliente->rua = $request->rua;
        }
        if(isset($request->numero)){
            $Cliente->numero = $request->numero;
        }
        if(isset($request->bairro)){
            $Cliente->bairro = $request->bairro;
        }
        if(isset($request->cep)){
            $Cliente->cep = $request->cep;
        }
        if(isset($request->complemento)){
            $Cliente->complemento = $request->complemento;
        }
        
        $Cliente->update();
    
        return response()->json([
            "status" => false,
            "message" => "Cliente atualizado"
        ]);
    }
    }