<?php

use App\Http\Controllers\Api\CadDespesaEspecificaParceladaController;
use App\Http\Controllers\Api\CadDespesaEspecificaPontualController;
use App\Http\Controllers\Api\CadReceitaEspecificaPontualController;
use App\Http\Controllers\Api\RelDespesaFixaValorController;
use App\Http\Controllers\Api\RelDespesaVariavelValorController;
use App\Http\Controllers\Api\RelReceitaFixaValorController;
use App\Http\Controllers\Api\RelReceitaVariavelValorController;
use App\Http\Controllers\Api\TipoDespesasFixasController;
use App\Http\Controllers\Api\TipoDespesasVariaveisController;
use App\Http\Controllers\Api\TipoReceitasFixasController;
use App\Http\Controllers\Api\TipoReceitasVariaveisController;
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

//tipos despesas fixas
Route::get('/despesas-fixas', [TipoDespesasFixasController::class, 'index'])->name('despesas-fixas.index');
Route::get('/despesas-fixas/{id}', [TipoDespesasFixasController::class, 'show'])->name('despesas-fixas.show');
Route::post('/despesas-fixas', [TipoDespesasFixasController::class, 'create'])->name('despesas-fixas.create');
Route::put('/despesas-fixas/{id}', [TipoDespesasFixasController::class, 'edit'])->name('despesas-fixas.edit');
Route::put('/despesas-fixas/{id}/{status}', [TipoDespesasFixasController::class, 'disable'])->name('despesas-fixas.disable');

//tipos despesas variaveis
Route::get('/despesas-variaveis', [TipoDespesasVariaveisController::class, 'index'])->name('despesas-variavies.index');
Route::get('/despesas-variaveis/{id}', [TipoDespesasVariaveisController::class, 'show'])->name('despesas-variavies.show');
Route::post('/despesas-variaveis', [TipoDespesasVariaveisController::class, 'create'])->name('despesas-variavies.create');
Route::put('/despesas-variaveis/{id}', [TipoDespesasVariaveisController::class, 'edit'])->name('despesas-variavies.edit');
Route::put('/despesas-variaveis/{id}/{status}', [TipoDespesasVariaveisController::class, 'disable'])->name('despesas-variavies.disable');

//associação de despesa fixa e valor
Route::get('/despesas-fixas/{id}/valor', [RelDespesaFixaValorController::class, 'index'])->name('despesas-fixas-valor.index');
Route::post('/despesas-fixas/{id}/valor', [RelDespesaFixaValorController::class, 'create'])->name('despesas-fixas-valor.create');
Route::put('/despesas-fixas/{id}/valor/{id_valor}', [RelDespesaFixaValorController::class, 'edit'])->name('despesas-fixas-valor.edit');
Route::put('/despesas-fixas/{id}/valor/{id_valor}/{status}', [RelDespesaFixaValorController::class, 'disable'])->name('despesas-fixas-valor.disable');

//associação de despesa variavel e valor
Route::get('/despesas-variaveis/{id}/valor', [RelDespesaVariavelValorController::class, 'index'])->name('despesas-variaveis-valor.index');
Route::post('/despesas-variaveis/{id}/valor', [RelDespesaVariavelValorController::class, 'create'])->name('despesas-variaveis-valor.create');
Route::put('/despesas-variaveis/{id}/valor/{id_valor}', [RelDespesaVariavelValorController::class, 'edit'])->name('despesas-variaveis-valor.edit');
Route::put('/despesas-variaveis/{id}/valor/{id_valor}/{status}', [RelDespesaVariavelValorController::class, 'disable'])->name('despesas-variaveis-valor.disable');

// cadastro de despesas específicas pontuais
Route::get('/despesas-esp-pontual', [CadDespesaEspecificaPontualController::class, 'index'])->name('despesas-esp-pontual.index');
Route::get('/despesas-esp-pontual/{id}', [CadDespesaEspecificaPontualController::class, 'show'])->name('despesas-esp-pontual.show');
Route::post('/despesas-esp-pontual', [CadDespesaEspecificaPontualController::class, 'create'])->name('despesas-esp-pontual.create');
Route::put('/despesas-esp-pontual/{id}', [CadDespesaEspecificaPontualController::class, 'edit'])->name('despesas-esp-pontual.edit');
Route::put('/despesas-esp-pontual/{id}/{status}', [CadDespesaEspecificaPontualController::class, 'disable'])->name('despesas-esp-pontual.disable');

// cadastro de despesas específicas parceladas
Route::get('/despesas-esp-parcelada', [CadDespesaEspecificaParceladaController::class, 'index'])->name('despesas-esp-parcelada.index');
Route::get('/despesas-esp-parcelada/{id}', [CadDespesaEspecificaParceladaController::class, 'show'])->name('despesas-esp-parcelada.show');
Route::post('/despesas-esp-parcelada', [CadDespesaEspecificaParceladaController::class, 'create'])->name('despesas-esp-parcelada.create');
Route::put('/despesas-esp-parcelada/{id}', [CadDespesaEspecificaParceladaController::class, 'edit'])->name('despesas-esp-parcelada.edit');
Route::put('/despesas-esp-parcelada/{id}/{status}', [CadDespesaEspecificaParceladaController::class, 'disable'])->name('despesas-esp-parcelada.disable');

//tipos receitas fixas
Route::get('/receitas-fixas', [TipoReceitasFixasController::class, 'index'])->name('receitas-fixas.index');
Route::get('/receitas-fixas/{id}', [TipoReceitasFixasController::class, 'show'])->name('receitas-fixas.show');
Route::post('/receitas-fixas', [TipoReceitasFixasController::class, 'create'])->name('receitas-fixas.create');
Route::put('/receitas-fixas/{id}', [TipoReceitasFixasController::class, 'edit'])->name('receitas-fixas.edit');
Route::put('/receitas-fixas/{id}/{status}', [TipoReceitasFixasController::class, 'disable'])->name('receitas-fixas.disable');

//tipos receitas variaveis
Route::get('/receitas-variaveis', [TipoReceitasVariaveisController::class, 'index'])->name('receitas-variavies.index');
Route::get('/receitas-variaveis/{id}', [TipoReceitasVariaveisController::class, 'show'])->name('receitas-variavies.show');
Route::post('/receitas-variaveis', [TipoReceitasVariaveisController::class, 'create'])->name('receitas-variavies.create');
Route::put('/receitas-variaveis/{id}', [TipoReceitasVariaveisController::class, 'edit'])->name('receitas-variavies.edit');
Route::put('/receitas-variaveis/{id}/{status}', [TipoReceitasVariaveisController::class, 'disable'])->name('receitas-variavies.disable');

//associação de receita fixa e valor
Route::get('/receitas-fixas/{id}/valor', [RelReceitaFixaValorController::class, 'index'])->name('receitas-fixas-valor.index');
Route::post('/receitas-fixas/{id}/valor', [RelReceitaFixaValorController::class, 'create'])->name('receitas-fixas-valor.create');
Route::put('/receitas-fixas/{id}/valor/{id_valor}', [RelReceitaFixaValorController::class, 'edit'])->name('receitas-fixas-valor.edit');
Route::put('/receitas-fixas/{id}/valor/{id_valor}/{status}', [RelReceitaFixaValorController::class, 'disable'])->name('receitas-fixas-valor.disable');

//associação de receita variavel e valor
Route::get('/receitas-variaveis/{id}/valor', [RelReceitaVariavelValorController::class, 'index'])->name('receitas-variaveis-valor.index');
Route::post('/receitas-variaveis/{id}/valor', [RelReceitaVariavelValorController::class, 'create'])->name('receitas-variaveis-valor.create');
Route::put('/receitas-variaveis/{id}/valor/{id_valor}', [RelReceitaVariavelValorController::class, 'edit'])->name('receitas-variaveis-valor.edit');
Route::put('/receitas-variaveis/{id}/valor/{id_valor}/{status}', [RelReceitaVariavelValorController::class, 'disable'])->name('receitas-variaveis-valor.disable');

// cadastro de receitas específicas pontuais
Route::get('/receitas-esp-pontual', [CadReceitaEspecificaPontualController::class, 'index'])->name('receitas-esp-pontual.index');
Route::get('/receitas-esp-pontual/{id}', [CadReceitaEspecificaPontualController::class, 'show'])->name('receitas-esp-pontual.show');
Route::post('/receitas-esp-pontual', [CadReceitaEspecificaPontualController::class, 'create'])->name('receitas-esp-pontual.create');
Route::put('/receitas-esp-pontual/{id}', [CadReceitaEspecificaPontualController::class, 'edit'])->name('receitas-esp-pontual.edit');
Route::put('/receitas-esp-pontual/{id}/{status}', [CadReceitaEspecificaPontualController::class, 'disable'])->name('receitas-esp-pontual.disable');
