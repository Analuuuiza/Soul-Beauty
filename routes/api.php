<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProfissionalController;
use App\Http\Controllers\ServicoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('servico/store',
[ServicoController::class, 'store']);

Route::delete('servico/delete/{id}',
[ServicoController::class, 'excluir']);

Route::put('servico/update',
[ServicoController::class, 'update']);

Route::get('servico/nome',
[ServicoController::class, 'pesquisarPorNome']);

Route::get('servico/find/descricao',
[ServicoController::class, 'pesquisarPorDescricao']); 


Route::post('clientes/store',
[clienteController::class, 'store']);

Route::delete('clientes/delete/{id}',
[ClienteControllerController::class, 'excluir']);

Route::put('clientes/update',
[ClienteControllerController::class, 'update']);

Route::get('clientes/nome',
[ClienteControllerController::class, 'pesquisarPorNome']);

Route::get('clientes/celular',
[ClienteControllerController::class, 'pesquisarPorCelular']);

Route::get('clientes/cpf',
[ClienteControllerController::class, 'pesquisarPorCpf']);

Route::get('clientes/email',
[ClienteControllerController::class, 'pesquisarPorEmail']);


Route::post('proficional/store',
[ProfissionalController::class, 'store']);

Route::delete('profissional/delete/{id}',
[ProfissionalController::class, 'excluir']);

Route::put('profissional/update',
[ProfissionalController::class, 'update']);

Route::get('profissional/nome',
[ProfissionalController::class, 'pesquisarPorNome']);

Route::get('profissional/celular',
[ProfissionalController::class, 'pesquisarPorCelular']);

Route::get('profissional/cpf',
[ProfissionalController::class, 'pesquisarPorCpf']);

Route::get('profissional/email',
[ProfissionalController::class, 'pesquisarPorEmail']);