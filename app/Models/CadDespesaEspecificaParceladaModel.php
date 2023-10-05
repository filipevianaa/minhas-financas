<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CadDespesaEspecificaParceladaModel extends Model
{
    use HasFactory;

    public function listAll()
    {
        $query = "SELECT * FROM cad_despesas_especificas_parceladas WHERE cod_user_par = 1 AND id_ativo_par = '1'";
        return DB::select($query);
    }

    public function getById($req)
    {
        $query = "SELECT * FROM cad_despesas_especificas_parceladas WHERE cod_desp_par = ?";
        $values = [$req->id];
        return DB::select($query, $values);
    }

    public function create($req)
    {
        $data_ins = date('Y-m-d');
        $data_final = date("Y-m-d", strtotime("+".$req->qtd_parcelas_par." months", strtotime($data_ins)));

        $query = "INSERT INTO cad_despesas_especificas_parceladas (cod_user_par, descricao_par, valor_parcela_par, dta_ins_par, dta_final_par)
        VALUES (?, ?, ?, ?, ?)";
        $values = [$req->cod_user_par, $req->descricao_par, $req->valor_parcela_par, $data_ins, $data_final];
        return DB::insert($query, $values);
    }

    public function edit($req)
    {
        $data_upd = date('Y-m-d');
        $data_ins = $this->getById($req)[0]->dta_ins_par;
        $data_final = date('Y-m-d', strtotime("+".$req->qtd_parcelas_par." months", strtotime($data_ins)));
        $query = "UPDATE cad_despesas_especificas_parceladas SET descricao_par = ?, valor_parcela_par = ?, qtd_parcelas_par = ?, dta_final_par = ?, dta_upd_par = ? WHERE cod_desp_par = ?";
        $values = [$req->descricao_par, $req->valor_parcela_par, $req->qtd_parcelas_par, $data_final, $data_upd,  $req->id];
        return DB::update($query, $values);
    }

    public function disable($req)
    {
        $query = "UPDATE cad_despesas_especificas_parceladas SET id_ativo_par = ? WHERE cod_desp_par = ?";
        $values = [$req->status, $req->id];
        return DB::update($query, $values);
    }
}
