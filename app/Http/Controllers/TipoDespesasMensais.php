<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\TipoDespesasFixasController as ApiTipoDespesasFixasController;
use App\Http\Controllers\Api\TipoDespesasVariaveisController as ApiTipoDespesasVariaveisController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TipoDespesasMensais extends Controller
{
    private $apiFixa;
    private $apiVar;
    private $apiInitialUrl;

    public function __construct()
    {
        $this->apiFixa = new ApiTipoDespesasFixasController();
        $this->apiVar = new ApiTipoDespesasVariaveisController();
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

    public function create(Request $req)
    {
        if($req->tipo == "1"){
            $response = Http::post($this->apiInitialUrl."despesas-fixas", [
                "cod_user_tdf" => 1,
                "descricao_tdf" => $req->descricao,
                "data_cobranca_tdf" => $req->dia
            ]);

        } else {
            $response = Http::post($this->apiInitialUrl."despesas-variaveis", [
                "cod_user_tdv" => 1,
                "descricao_tdv" => $req->descricao,
                "data_cobranca_tdv" => $req->dia
            ]);

        }
        if($response->ok()){
            $mensagem = ["mensagem.sucesso" => "Registro inserido com sucesso"];
        } else {
            $mensagem = ["mensagem.erro" => "Erro ao inserir registro"];
        }

        return to_route('despesas-mensais.index')->with($mensagem);
    }

    public function edit(Request $req)
    {
        if($req->tipo == "1"){
            $response = Http::withUrlParameters([
                "id" => $req->id
            ])->put($this->apiInitialUrl."despesas-fixas/{id}", [
                "descricao_tdf" => $req->descricao,
                "data_cobranca_tdf" => $req->dia
            ]);
        } else {
            $response = Http::withUrlParameters([
                "id" => $req->id
            ])->put($this->apiInitialUrl."despesas-variaveis/{id}", [
                "descricao_tdv" => $req->descricao,
                "data_cobranca_tdv" => $req->dia
            ]);
        }

        if($response->ok()){
            $mensagem = ["mensagem.sucesso" => "Registro alterado com sucesso"];
        } else {
            $mensagem = ["mensagem.erro" => "Erro ao alterar registro"];
        }

        return to_route('despesas-mensais.index')->with($mensagem);
        
    }

    public function disable(Request $req)
    {
        // dd($req);
        if($req->tipo == '1'){
            $response = Http::withUrlParameters([
                "id" => $req->id,
                "status" => $req->status,
            ])->put($this->apiInitialUrl."despesas-fixas/{id}/{status}");
        } else {
            $response = Http::withUrlParameters([
                "id" => $req->id,
                "status" => $req->status,
            ])->put($this->apiInitialUrl."despesas-variaveis/{id}/{status}");
        }

        if($response){
            $mensagem = ["mensagem.sucesso" => "Registro alterado com sucesso"];
        } else {
            $mensagem = ["mensagem.erro" => "Erro ao alterar registro"];
        }

        return to_route('despesas-mensais.index')->with($mensagem);
    }
}
