<?php

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
Route::get('/despesas-mensais', [TipoDespesasMensais::class, 'index'])->name('despesas-mensais.index');
Route::post('/despesas-mensais', [TipoDespesasMensais::class, 'create'])->name('despesas-mensais.create');
Route::post('/despesas-mensais/{tipo}/{id}', [TipoDespesasMensais::class, 'edit'])->name('despesas-mensais.edit');
Route::get('/despesas-mensais/{tipo}/{id}/{status}', [TipoDespesasMensais::class, 'disable'])->name('despesas-mensais.disable');

//associação de despesa fixa e valor
Route::put('/despesas-fixas/{id}/valor/{id_valor}', [RelDespesaFixaValorController::class, 'edit'])->name('despesas-fixas-valor.edit');

//tipos de receitas mensais
Route::get('/receitas-mensais', [TipoReceitasMensais::class, 'index'])->name('receitas-mensais.index');
Route::post('/receitas-mensais', [TipoReceitasMensais::class, 'create'])->name('receitas-mensais.create');
Route::post('/receitas-mensais/{tipo}/{id}', [TipoReceitasMensais::class, 'edit'])->name('receitas-mensais.edit');
Route::get('/receitas-mensais/{tipo}/{id}/{status}', [TipoReceitasMensais::class, 'disable'])->name('receitas-mensais.disable');
