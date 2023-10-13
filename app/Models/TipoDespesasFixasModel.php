<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TipoDespesasFixasModel extends Model
{
    use HasFactory;

    public function listAll()
    {
        $query = "select * from cad_tipos_despesas_fixas";
        return DB::select($query);
    }

    public function getById($id)
    {
        return DB::select('SELECT * FROM cad_tipos_despesas_fixas where cod_tipo_desp_tdf = ?', [$id]);
    }

    public function create($req)
    {
        $data_ins = date("Y-m-d");
        $query = "INSERT INTO cad_tipos_despesas_fixas (cod_user_tdf, descricao_tdf, data_cobranca_tdf, dta_ins_tdf) 
        VALUES (?, ?, ?, ?)";

        $values = [$req->cod_user_tdf, $req->descricao_tdf, $req->data_cobranca_tdf, $data_ins];

        return DB::insert($query, $values);
    }

    public function edit($req)
    {
        $data_upd = date("Y-m-d");
        $query = "UPDATE cad_tipos_despesas_fixas SET descricao_tdf = ?, data_cobranca_tdf = ?, dta_upd_tdf = ? WHERE cod_tipo_desp_tdf = ?";
        $values = [$req->descricao_tdf, $req->data_cobranca_tdf, $data_upd, $req->id];
        return DB::update($query, $values);
    }

    public function disable($req)
    {
        $query = "UPDATE cad_tipos_despesas_fixas SET id_ativo_tdf = ? WHERE cod_tipo_desp_tdf = ?";
        $values = [$req->status, $req->id];
        return DB::update($query, $values);
    }
}
