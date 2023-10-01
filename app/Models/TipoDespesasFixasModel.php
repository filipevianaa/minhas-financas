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
        return DB::select('SELECT * FROM cad_tipos_despesas_fixas');
    }

    public function getById($id)
    {
        return DB::select('SELECT * FROM cad_tipos_despesas_fixas where cod_tipo_desp_tdf = ?', [$id]);
    }

    public function create($req)
    {
        $query = "INSERT INTO cad_tipos_despesas_fixas (cod_user_tdf, descricao_tdf, data_cobranca_tdf, dta_ins_tdf, dta_upd_tdf, id_ativo_tdf) 
        VALUES (?, ?, ?, ?, ?, ?)";

        $values = [$req->cod_user_tdf, $req->descricao_tdf, $req->data_cobranca_tdf, $req->dta_ins_tdf, $req->dta_upd_tdf, $req->id_ativo_tdf];

        return DB::insert($query, $values);
    }

    public function edit($req)
    {
        $query = "UPDATE cad_tipos_despesas_fixas SET descricao_tdf = ?, data_cobranca_tdf = ?, dta_upd_tdf = ? WHERE cod_tipo_desp_tdf = ?";
        $values = [$req->descricao_tdf, $req->data_cobranca_tdf, $req->dta_upd_tdf, $req->id];
        return DB::update($query, $values);
    }

    public function disable($req)
    {
        $query = "UPDATE cad_tipos_despesas_fixas SET id_ativo_tdf = ? WHERE cod_tipo_desp_tdf = ?";
        $values = [$req->status, $req->id];
        return DB::update($query, $values);
    }
}
