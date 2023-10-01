<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TipoDespesasVariaveisModel extends Model
{
    use HasFactory;

    public function listAll()
    {
        $query = "SELECT * FROM cad_tipos_despesas_variaveis";
        return DB::select($query);
    }

    public function getById($id)
    {
        return DB::select('SELECT * FROM cad_tipos_despesas_variaveis where cod_tipo_desp_tdv = ?', [$id]);
    }

    public function create($req)
    {
        $query = "INSERT INTO cad_tipos_despesas_variaveis (cod_user_tdv, descricao_tdv, data_cobranca_tdv, dta_ins_tdv, dta_upd_tdv, id_ativo_tdv) 
        VALUES (?, ?, ?, ?, ?, ?)";

        $values = [$req->cod_user_tdv, $req->descricao_tdv, $req->data_cobranca_tdv, $req->dta_ins_tdv, $req->dta_upd_tdv, $req->id_ativo_tdv];

        return DB::insert($query, $values);
    }

    public function edit($req)
    {
        $query = "UPDATE cad_tipos_despesas_variaveis SET descricao_tdv = ?, data_cobranca_tdv = ?, dta_upd_tdv = ? WHERE cod_tipo_desp_tdv = ?";
        $values = [$req->descricao_tdv, $req->data_cobranca_tdv, $req->dta_upd_tdv, $req->id];
        return DB::update($query, $values);
    }

    public function disable($req)
    {
        $query = "UPDATE cad_tipos_despesas_variaveis SET id_ativo_tdv = ? WHERE cod_tipo_desp_tdv = ?";
        $values = [$req->status, $req->id];
        return DB::update($query, $values);
    }
}
