<?php

use App\Http\Controllers\DespesasFixasController;
use App\Http\Controllers\DespesaValorController;
use App\Http\Controllers\RelDespesaFixaValorController;
use App\Http\Controllers\TipoDespesasMensais;
use App\Http\Controllers\TipoDespesasVariaveisController;
use App\Http\Controllers\TipoReceitasMensais;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//tipos despesas mensais
Route::get('/despesas-mensais', [DespesasFixasController::class, 'index'])->name('despesas-mensais.index');
Route::post('/despesas-mensais', [DespesasFixasController::class, 'create'])->name('despesas-mensais.create');
Route::post('/despesas-mensais/{id}', [DespesasFixasController::class, 'edit'])->name('despesas-mensais.edit');
Route::get('/despesas-mensais/{id}/{status}', [DespesasFixasController::class, 'disable'])->name('despesas-mensais.disable');

//cadastro de despesas
Route::get('/despesas-valor', [DespesaValorController::class, 'index'])->name('despesas-valor.index');


//tipos de receitas mensais
Route::get('/receitas-mensais', [TipoReceitasMensais::class, 'index'])->name('receitas-mensais.index');
Route::post('/receitas-mensais', [TipoReceitasMensais::class, 'create'])->name('receitas-mensais.create');
Route::post('/receitas-mensais/{tipo}/{id}', [TipoReceitasMensais::class, 'edit'])->name('receitas-mensais.edit');
Route::get('/receitas-mensais/{tipo}/{id}/{status}', [TipoReceitasMensais::class, 'disable'])->name('receitas-mensais.disable');
