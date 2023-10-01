<?php

use App\Http\Controllers\Api\TipoDespesasFixasController;
use App\Http\Controllers\Api\TipoDespesasVariaveisController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/despesas-fixas', [TipoDespesasFixasController::class, 'index'])->name('despesas-fixas.index');
Route::get('/despesas-fixas/{id}', [TipoDespesasFixasController::class, 'show'])->name('despesas-fixas.show');
Route::post('/despesas-fixas', [TipoDespesasFixasController::class, 'create'])->name('despesas-fixas.create');
Route::put('/despesas-fixas/{id}', [TipoDespesasFixasController::class, 'edit'])->name('despesas-fixas.edit');
Route::put('/despesas-fixas/{id}/{status}', [TipoDespesasFixasController::class, 'disable'])->name('despesas-fixas.disable');

Route::put('/despesas-variaveis', [TipoDespesasVariaveisController::class, 'index'])->name('despesas-variavies.index');