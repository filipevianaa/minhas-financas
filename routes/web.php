<?php

use App\Http\Controllers\RelDespesaFixaValorController;
use App\Http\Controllers\TipoDespesasMensais;
use App\Http\Controllers\TipoDespesasVariaveisController;
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

//tipos despesas fixas
Route::get('/despesas-mensais', [TipoDespesasMensais::class, 'index'])->name('despesas-mensais.index');
Route::post('/despesas-mensais', [TipoDespesasMensais::class, 'create'])->name('despesas-mensais.create');
Route::post('/despesas-mensais/{tipo}/{id}', [TipoDespesasMensais::class, 'edit'])->name('despesas-mensais.edit');
Route::get('/despesas-mensais/{tipo}/{id}/{status}', [TipoDespesasMensais::class, 'disable'])->name('despesas-mensais.disable');

//tipos despesas variaveis
Route::get('/despesas-variaveis', [TipoDespesasVariaveisController::class, 'index'])->name('despesas-variaveis.index');

////associação de despesa fixa e valor
Route::put('/despesas-fixas/{id}/valor/{id_valor}', [RelDespesaFixaValorController::class, 'edit'])->name('despesas-fixas-valor.edit');
