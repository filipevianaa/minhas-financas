<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DespesaValorController extends Controller
{
    private $apiInitialUrl;

    public function __construct()
    {
        $this->apiInitialUrl = 'http://localhost:8000/api/';
    }

    public function index(Request $req)
    {
        $responseFixa = Http::get($this->apiInitialUrl.'despesas-fixas');
        $responseVar = Http::get($this->apiInitialUrl.'despesas-variaveis');

        $mensagemSucesso = $req->session()->get('mensagem.sucesso');
        $req->session()->forget('mensagem.sucesso');

        $mensagemErro = $req->session()->get('mensagem.erro');
        $req->session()->forget('mensagem.erro');

        $tipoDespFixa = $responseFixa->object();
        $tipoDespVar = $responseVar->object();

        $data['tipoDespFixa'] = $tipoDespFixa;
        $data['tipoDespVar'] = $tipoDespVar;
        return view('tipoDespMensal.index')->with($data)->with('mensagemSucesso', $mensagemSucesso)->with('mensagemErro', $mensagemErro);
    }
}
