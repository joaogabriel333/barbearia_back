<?php

use App\Http\Controllers\AdmController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\AgendaProfissionaiscontroller;
use App\Http\Controllers\clientecontroller;
use App\Http\Controllers\PagamentoController;
use App\Http\Controllers\Profissionalcontroller;
use App\Http\Controllers\ServicoController;
use App\Models\servico;
use Database\Seeders\servicoSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


//Clientes
route::post('clientes', [clientecontroller::class, 'clientes']);
route::get('clientes/nome', [clientecontroller::class, 'pesquisarPorNome']);
route::get('clientes/cpf', [clientecontroller::class, 'pesquisarPorCpf']);
route::get('clientes/celular', [clientecontroller::class, 'pesquisarPorCelular']);
route::get('clientes/email', [clientecontroller::class, 'pesquisarPorEmail']);
route::get('clientes/find/{id}', [clientecontroller::class, 'pesquisarPorId']);
route::delete('clientes/delete/{id}', [clientecontroller::class, 'excluir']);
route::put('clientes/update', [clientecontroller::class, 'update']);
route::get('clientes/visualizar', [clientecontroller::class, 'retornarTodos']);
Route::post('clientes/senha',[clientecontroller::class, 'redefinirSenha']);


//Adm
route::post('Adm', [AdmController::class, 'adms']);
route::get('Adm/cpf', [AdmController::class, 'pesquisarPorCpf']);
route::get('Adm/nome', [AdmController::class, 'pesquisarPorNome']);
route::get('Adm/email', [AdmController::class, 'pesquisarPorEmail']);
route::get('Adm/find/{id}', [AdmController::class, 'pesquisarPorId']);
route::delete('Adm/delete/{id}', [AdmController::class, 'excluir']);
route::put('Adm/update', [AdmController::class, 'update']);
route::get('Adm/visualizar', [AdmController::class, 'retornarTodos']);
Route::post('Adm/senha',[AdmController::class, 'redefinirSenha']);


//Adm Profissional
route::post('Adm/profissional', [Profissionalcontroller::class, 'profissionais']);
route::get('Adm/profissional/nome', [Profissionalcontroller::class, 'pesquisarPorNome']);
route::get('Adm/profissional/cpf', [Profissionalcontroller::class, 'pesquisarPorCpf']);
route::get('Adm/profissional/celular', [Profissionalcontroller::class, 'pesquisarPorCelular']);
route::get('Adm/profissional/email', [Profissionalcontroller::class, 'pesquisarPorEmail']);
route::get('Adm/profissional/find/{id}', [Profissionalcontroller::class, 'pesquisarPorId']);
route::delete('Adm/profissional/delete/{id}', [Profissionalcontroller::class, 'excluir']);
route::put('Adm/profissional/update', [Profissionalcontroller::class, 'update']);
route::get('Adm/profissional/visualizar', [Profissionalcontroller::class, 'retornarTodos']);
Route::post('Adm/profissional/senha',[Profissionalcontroller::class, 'redefinirSenha']);


//Adm clientes
route::post('Adm/clientes', [clientecontroller::class, 'clientes']);
route::get('Adm/clientes/nome', [clientecontroller::class, 'pesquisarPorNome']);
route::get('Adm/clientes/cpf', [clientecontroller::class, 'pesquisarPorCpf']);
route::get('Adm/clientes/celular', [clientecontroller::class, 'pesquisarPorCelular']);
route::get('Adm/clientes/email', [clientecontroller::class, 'pesquisarPorEmail']);
route::get('Adm/clientes/find/{id}', [clientecontroller::class, 'pesquisarPorId']);
route::delete('Adm/clientes/delete/{id}', [clientecontroller::class, 'excluir']);
route::put('Adm/clientes/update', [clientecontroller::class, 'update']);
route::get('Adm/clientes/visualizar', [clientecontroller::class, 'retornarTodos']);
Route::post('Adm/clientes/senha',[clientecontroller::class, 'redefinirSenha']);


//Adm Serviços
route::post('Adm/servicos', [ServicoController::class, 'servicos']);
route::get('Adm/servicos/descricao', [ServicoController::class, 'pesquisarPorDescricao']);
route::get('Adm/servicos/nome', [ServicoController::class, 'pesquisarPorNome']);
route::get('Adm/servicos/find/{id}', [ServicoController::class, 'pesquisarPorId']);
route::delete('Adm/servicos/delete/{id}', [ServicoController::class, 'excluir']);
route::put('Adm/servicos/update', [ServicoController::class, 'update']);
route::get('Adm/servicos/visualizar', [ServicoController::class, 'retornarTodos']);


//Adm Horarios
route::post('Adm/agendamento', [AgendaProfissionaiscontroller::class, 'cadastroAgenda']);
route::get('Adm/agendamento/Profissional', [AgendaProfissionaiscontroller::class, 'pesquisarPorProfissional']);
route::get('Adm/agendamento/data', [AgendaProfissionaiscontroller::class, 'pesquisarPorAgendamento']);
route::delete('Adm/agendamento/delete/{id}', [AgendaProfissionaiscontroller::class, 'excluir']);
route::put('Adm/agendamento/update', [AgendaProfissionaiscontroller::class, 'update']);
route::get('Adm/agendamento/visualizar', [AgendaProfissionaiscontroller::class, 'retornarTodos']);
route::get('Adm/agendamento/find/{id}', [AgendaProfissionaiscontroller::class, 'pesquisarPorId']);


//Adm Tipo de pagamento
route::post('Adm/pagamento', [PagamentoController::class, 'pagamentos']);
route::get('Adm/pagamento/nome', [PagamentoController::class, 'pesquisarPorPagamento']);
route::get('Adm/pagamento/find/{id}', [PagamentoController::class, 'pesquisarPorId']);
route::delete('Adm/pagamento/delete/{id}', [PagamentoController::class, 'excluir']);
route::put('Adm/pagamento/update', [PagamentoController::class, 'update']);
route::get('Adm/pagamento/visualizar', [PagamentoController::class, 'retornarTodos']);


//Profissional
route::post('profissional', [Profissionalcontroller::class, 'profissionais']);
route::get('profissional/nome', [Profissionalcontroller::class, 'pesquisarPorNome']);
route::get('profissional/cpf', [Profissionalcontroller::class, 'pesquisarPorCpf']);
route::get('profissional/celular', [Profissionalcontroller::class, 'pesquisarPorCelular']);
route::get('profissional/email', [Profissionalcontroller::class, 'pesquisarPorEmail']);
route::get('profissional/find/{id}', [Profissionalcontroller::class, 'pesquisarPorId']);
route::delete('profissional/delete/{id}', [Profissionalcontroller::class, 'excluir']);
route::put('profissional/update', [Profissionalcontroller::class, 'update']);
route::get('profissional/visualizar', [Profissionalcontroller::class, 'retornarTodos']);
Route::post('profissional/senha',[Profissionalcontroller::class, 'redefinirSenha']);


//profissional Clientes
route::post('profissional/clientes', [clientecontroller::class, 'clientes']);
route::get('profissional/clientes/nome', [clientecontroller::class, 'pesquisarPorNome']);
route::get('profissional/clientes/cpf', [clientecontroller::class, 'pesquisarPorCpf']);
route::get('profissional/clientes/celular', [clientecontroller::class, 'pesquisarPorCelular']);
route::get('profissional/clientes/email', [clientecontroller::class, 'pesquisarPorEmail']);
route::get('profissional/clientes/find/{id}', [clientecontroller::class, 'pesquisarPorId']);
route::delete('profissional/clientes/delete/{id}', [clientecontroller::class, 'excluir']);
route::put('profissional/clientes/update', [clientecontroller::class, 'update']);
route::get('profissional/clientes/visualizar', [clientecontroller::class, 'retornarTodos']);
Route::post('profissional/clientes/senha',[clientecontroller::class, 'redefinirSenha']);

//profissional Horarios
route::post('profissional/agendamento', [AgendaProfissionaiscontroller::class, 'cadastroAgenda']);
route::get('profissional/agendamento/Profissional', [AgendaProfissionaiscontroller::class, 'pesquisarPorProfissional']);
route::get('profissional/agendamento/data', [AgendaProfissionaiscontroller::class, 'pesquisarPorAgendamento']);
route::delete('profissional/agendamento/delete/{id}', [AgendaProfissionaiscontroller::class, 'excluir']);
route::put('profissional/agendamento/update', [AgendaProfissionaiscontroller::class, 'update']);
route::get('profissional/agendamento/visualizar', [AgendaProfissionaiscontroller::class, 'retornarTodos']);
route::get('profissional/agendamento/find/{id}', [AgendaProfissionaiscontroller::class, 'pesquisarPorId']);


//Serviços
route::post('servicos', [ServicoController::class, 'servicos']);
route::get('servicos/descricao', [ServicoController::class, 'pesquisarPorDescricao']);
route::get('servicos/nome', [ServicoController::class, 'pesquisarPorNome']);
route::get('servicos/find/{id}', [ServicoController::class, 'pesquisarPorId']);
route::delete('servicos/delete/{id}', [ServicoController::class, 'excluir']);
route::put('servicos/update', [ServicoController::class, 'update']);
route::get('servicos/visualizar', [ServicoController::class, 'retornarTodos']);


//Tipo de pagamento
route::post('pagamento', [PagamentoController::class, 'pagamentos']);
route::get('pagamento/nome', [PagamentoController::class, 'pesquisarPorPagamento']);
route::get('pagamento/find/{id}', [PagamentoController::class, 'pesquisarPorId']);
route::delete('pagamento/delete/{id}', [PagamentoController::class, 'excluir']);
route::put('pagamento/update', [PagamentoController::class, 'update']);
route::get('pagamento/visualizar', [PagamentoController::class, 'retornarTodos']);


//Agendamento Profissionais
route::post('agendamento', [AgendaProfissionaiscontroller::class, 'cadastroAgenda']);
route::post('agendamento/Profissional', [AgendaProfissionaiscontroller::class, 'pesquisarPorProfissional']);
route::post('agendamento/data', [AgendaProfissionaiscontroller::class, 'pesquisarPorData']);
route::delete('agendamento/delete/{id}', [AgendaProfissionaiscontroller::class, 'excluir']);
route::put('agendamento/update', [AgendaProfissionaiscontroller::class, 'update']);
route::get('agendamento/visualizar', [AgendaProfissionaiscontroller::class, 'retornarTodos']);
route::get('agendamento/findo/{id}', [AgendaProfissionaiscontroller::class, 'pesquisarPorId']);


//Agenda
route::post('agenda', [AgendaController::class, 'agenda']);
route::delete('agenda/delete/{id}', [AgendaController::class, 'excluir']);
route::put('agenda/update', [AgendaController::class, 'update']);
route::get('agenda/visualizar', [AgendaController::class, 'retornarTodos']);