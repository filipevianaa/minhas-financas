<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\TipoReceitasFixasController as ApiTipoReceitasFixasController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TipoReceitasMensais extends Controller
{
    private $apiInitialUrl;

    public function __construct()
    {
        $this->apiInitialUrl = 'http://localhost:8000/api/';
    }

    public function index(Request $req)
    {
        $responseFixa = Http::get($this->apiInitialUrl.'receitas-fixas');
        $responseVar = Http::get($this->apiInitialUrl.'receitas-variaveis');

        $mensagemSucesso = $req->session()->get('mensagem.sucesso');
        $req->session()->forget('mensagem.sucesso');

        $mensagemErro = $req->session()->get('mensagem.erro');
        $req->session()->forget('mensagem.erro');

        $tipoRecFixa = $responseFixa->object();
        $tipoRecVar = $responseVar->object();

        $data['tipoRecFixa'] = $tipoRecFixa;
        $data['tipoRecVar'] = $tipoRecVar;
        return view('tipoRecMensal.index')->with($data)->with('mensagemSucesso', $mensagemSucesso)->with('mensagemErro', $mensagemErro);

    }

    public function create(Request $req)
    {
        if($req->tipo == "1"){
            $response = Http::post($this->apiInitialUrl."receitas-fixas", [
                "cod_user_trf" => 1,
                "descricao_trf" => $req->descricao,
                "data_receita_trf" => $req->dia
            ]);

        } else {
            $response = Http::post($this->apiInitialUrl."receitas-variaveis", [
                "cod_user_trv" => 1,
                "descricao_trv" => $req->descricao,
                "data_receita_trv" => $req->dia
            ]);

        }
        if($response->ok()){
            $mensagem = ["mensagem.sucesso" => "Registro inserido com sucesso"];
        } else {
            $mensagem = ["mensagem.erro" => "Erro ao inserir registro"];
        }

        return to_route('receitas-mensais.index')->with($mensagem);
    }

    public function edit(Request $req)
    {
        if($req->tipo == "1"){
            $response = Http::withUrlParameters([
                "id" => $req->id
            ])->put($this->apiInitialUrl."receitas-fixas/{id}", [
                "descricao_trf" => $req->descricao,
                "data_receita_trf" => $req->dia
            ]);
        } else {
            $response = Http::withUrlParameters([
                "id" => $req->id
            ])->put($this->apiInitialUrl."receitas-variaveis/{id}", [
                "descricao_trv" => $req->descricao,
                "data_receita_trv" => $req->dia
            ]);
        }

        if($response->ok()){
            $mensagem = ["mensagem.sucesso" => "Registro alterado com sucesso"];
        } else {
            $mensagem = ["mensagem.erro" => "Erro ao alterar registro"];
        }

        return to_route('receitas-mensais.index')->with($mensagem);
    }

    public function disable(Request $req)
    {
        if($req->tipo == '1'){
            $response = Http::withUrlParameters([
                "id" => $req->id,
                "status" => $req->status,
            ])->put($this->apiInitialUrl."receitas-fixas/{id}/{status}");
        } else {
            $response = Http::withUrlParameters([
                "id" => $req->id,
                "status" => $req->status,
            ])->put($this->apiInitialUrl."receitas-variaveis/{id}/{status}");
        }

        if($response){
            $mensagem = ["mensagem.sucesso" => "Registro alterado com sucesso"];
        } else {
            $mensagem = ["mensagem.erro" => "Erro ao alterar registro"];
        }

        return to_route('receitas-mensais.index')->with($mensagem);
    }
}
