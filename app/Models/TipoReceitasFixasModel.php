<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TipoReceitasFixasModel extends Model
{
    use HasFactory;

    public function listAll()
    {
        return DB::select('SELECT * FROM cad_tipos_receitas_fixas');
    }

    public function getById($id)
    {
        return DB::select('SELECT * FROM cad_tipos_receitas_fixas where cod_tipo_rec_trf = ?', [$id]);
    }

    public function create($req)
    {
        $data_ins = date("Y-m-d");
        $query = "INSERT INTO cad_tipos_receitas_fixas (cod_user_trf, descricao_trf, data_receita_trf, dta_ins_trf, dta_upd_trf) 
        VALUES (?, ?, ?, ?, ?)";

        $values = [$req->cod_user_trf, $req->descricao_trf, $req->data_receita_trf, $data_ins, $req->dta_upd_trf];

        return DB::insert($query, $values);
    }

    public function edit($req)
    {
        $data_upd = date("Y-m-d");
        $query = "UPDATE cad_tipos_receitas_fixas SET descricao_trf = ?, data_receita_trf = ?, dta_upd_trf = ? WHERE cod_tipo_rec_trf = ?";
        $values = [$req->descricao_trf, $req->data_receita_trf, $data_upd, $req->id];
        return DB::update($query, $values);
    }

    public function disable($req)
    {
        $query = "UPDATE cad_tipos_receitas_fixas SET id_ativo_trf = ? WHERE cod_tipo_rec_trf = ?";
        $values = [$req->status, $req->id];
        return DB::update($query, $values);
    }
}
