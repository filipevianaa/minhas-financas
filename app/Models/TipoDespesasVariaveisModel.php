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
        $data_ins = date("Y-m-d");
        $query = "INSERT INTO cad_tipos_despesas_variaveis (cod_user_tdv, descricao_tdv, data_cobranca_tdv, dta_ins_tdv) 
        VALUES (?, ?, ?, ?)";

        $values = [$req->cod_user_tdv, $req->descricao_tdv, $req->data_cobranca_tdv, $data_ins];

        return DB::insert($query, $values);
    }

    public function edit($req)
    {
        $data_upd = date("Y-m-d");
        $query = "UPDATE cad_tipos_despesas_variaveis SET descricao_tdv = ?, data_cobranca_tdv = ?, dta_upd_tdv = ? WHERE cod_tipo_desp_tdv = ?";
        $values = [$req->descricao_tdv, $req->data_cobranca_tdv, $data_upd, $req->id];
        return DB::update($query, $values);
    }

    public function disable($req)
    {
        $query = "UPDATE cad_tipos_despesas_variaveis SET id_ativo_tdv = ? WHERE cod_tipo_desp_tdv = ?";
        $values = [$req->status, $req->id];
        return DB::update($query, $values);
    }
}
