<?php

use App\Http\Controllers\TipoDespesasFixasController;
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
Route::get('/despesas-fixas', [TipoDespesasFixasController::class, 'index'])->name('despesas-fixas.index');

//tipos despesas variaveis
Route::get('/despesas-variaveis', [TipoDespesasVariaveisController::class, 'index'])->name('despesas-variaveis.index');