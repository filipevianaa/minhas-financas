<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\TipoDespesasFixasController as ApiTipoDespesasFixasController;
use App\Http\Controllers\Api\TipoDespesasVariaveisController as ApiTipoDespesasVariaveisController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DespesasFixasController extends Controller
{
    private $apiInitialUrl;

    public function __construct()
    {
        $this->apiInitialUrl = 'http://localhost:8000/api/';
    }

    public function index(Request $req)
    {
        $responseFixa = Http::get($this->apiInitialUrl.'despesas-fixas');

        $mensagemSucesso = $req->session()->get('mensagem.sucesso');
        $req->session()->forget('mensagem.sucesso');

        $mensagemErro = $req->session()->get('mensagem.erro');
        $req->session()->forget('mensagem.erro');

        $tipoDespFixa = $responseFixa->object();

        $data['tipoDespFixa'] = $tipoDespFixa;
       
        foreach($data['tipoDespFixa'] as $despFixa){
            $responseValorFixa = Http::withUrlParameters([
                "id" => $despFixa->cod_tipo_desp_tdf
            ])->get($this->apiInitialUrl."despesas-fixas/{id}/valor");

            $responseValorFixa = $responseValorFixa->object();
            if(!empty($responseValorFixa)){
                $despFixa->cod_desp_dfv = $responseValorFixa[0]->cod_desp_dfv;
                $despFixa->cod_tipo_desp_dfv = $responseValorFixa[0]->cod_tipo_desp_dfv;
                $despFixa->valor_dfv = $responseValorFixa[0]->valor_dfv;
            }
        }

       
        return view('despFixas.index')->with($data)->with('mensagemSucesso', $mensagemSucesso)->with('mensagemErro', $mensagemErro);
    }

    public function create(Request $req)
    {
       
        $response = Http::post($this->apiInitialUrl."despesas-fixas", [
            "cod_user_tdf" => 1,
            "descricao_tdf" => $req->descricao
        ]);
        
        if($response->ok()){
            $mensagem = ["mensagem.sucesso" => "Registro inserido com sucesso"];
        } else {
            $mensagem = ["mensagem.erro" => "Erro ao inserir registro"];
        }

        return to_route('despesas-mensais.index')->with($mensagem);
    }

    public function edit(Request $req)
    {
        
        $response = Http::withUrlParameters([
            "id" => $req->id
        ])->put($this->apiInitialUrl."despesas-fixas/{id}", [
            "descricao_tdf" => $req->descricao
        ]);

        if($response->ok()){
            $mensagem = ["mensagem.sucesso" => "Registro alterado com sucesso"];
        } else {
            $mensagem = ["mensagem.erro" => "Erro ao alterar registro"];
        }

        return to_route('despesas-mensais.index')->with($mensagem);
        
    }

    public function disable(Request $req)
    {
        $response = Http::withUrlParameters([
            "id" => $req->id,
            "status" => $req->status,
        ])->put($this->apiInitialUrl."despesas-fixas/{id}/{status}");

        if($response){
            $mensagem = ["mensagem.sucesso" => "Registro alterado com sucesso"];
        } else {
            $mensagem = ["mensagem.erro" => "Erro ao alterar registro"];
        }

        return to_route('despesas-mensais.index')->with($mensagem);
    }
}
