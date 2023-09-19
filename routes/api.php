<?php

use App\Http\Controllers\ClienteController;
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

Route::post('servico/nome',
[ServicoController::class, 'pesquisarPorNome']);

Route::get('servico/find/descricao/{descricao}',
[ServicoController::class, 'pesquisarPoDescricao']); 


Route::post('clientes/store',
[ClienteController::class, 'store']);

Route::delete('clientes/delete/{id}',
[ClienteController::class, 'excluir']);

Route::put('clientes/update',
[ClienteController::class, 'update']);

Route::get('clientes/nome',
[ClienteController::class, 'pesquisarPorNome']);

Route::get('clientes/celular',
[ClienteController::class, 'pesquisarPorCelular']);

Route::get('clientes/cpf',
[ClienteController::class, 'pesquisarPorCpf']);

Route::get('clientes/email',
[ClienteController::class, 'pesquisarPorEmail']);