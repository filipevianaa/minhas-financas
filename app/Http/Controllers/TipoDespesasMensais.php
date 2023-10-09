<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\TipoDespesasFixasController as ApiTipoDespesasFixasController;
use App\Http\Controllers\Api\TipoDespesasVariaveisController as ApiTipoDespesasVariaveisController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TipoDespesasMensais extends Controller
{
    private $apiFixa;
    private $apiVar;

    public function __construct()
    {
        $this->apiFixa = new ApiTipoDespesasFixasController();
        $this->apiVar = new ApiTipoDespesasVariaveisController();
    }

    public function index(Request $req)
    {
        $mensagemSucesso = $req->session()->get('mensagem.sucesso');
        $req->session()->forget('mensagem.sucesso');
        $tipoDespFixa = $this->apiFixa->index();
        $tipoDespVar = $this->apiVar->index();
        $data['tipoDespFixa'] = $tipoDespFixa;
        $data['tipoDespVar'] = $tipoDespVar;
        return view('tipoDespMensal.index')->with($data)->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create(Request $req)
    {
        if($req->tipo == "1"){
            $req->cod_user_tdf = 1;
            $req->descricao_tdf = $req->descricao;
            $req->data_cobranca_tdf = $req->dia;

            $insert = $this->apiFixa->create($req);
        } else {
            $req->cod_user_tdv = 1;
            $req->descricao_tdv = $req->descricao;
            $req->data_cobranca_tdv = $req->dia;

            $insert = $this->apiVar->create($req);
        }
        if($insert){
            $mensagem = ["mensagem.sucesso" => "Registro inserido com sucesso"];
        } else {
            $mensagem = ["mensagem.erro" => "Erro ao inserir registro"];
        }

        return to_route('despesas-mensais.index')->with($mensagem);
    }
}
