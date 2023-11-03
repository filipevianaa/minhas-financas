<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TipoReceitasVariaveisModel extends Model
{
    use HasFactory;

    public function listAll()
    {
        $query = "SELECT * FROM cad_tipos_receitas_variaveis";
        return DB::select($query);
    }

    public function getById($id)
    {
        return DB::select('SELECT * FROM cad_tipos_receitas_variaveis where cod_tipo_rec_trv = ?', [$id]);
    }

    public function create($req)
    {
        $data_ins = date("Y-m-d");
        $query = "INSERT INTO cad_tipos_receitas_variaveis (cod_user_trv, descricao_trv, data_receita_trv, dta_ins_trv) 
        VALUES (?, ?, ?, ?)";

        $values = [$req->cod_user_trv, $req->descricao_trv, $req->data_receita_trv, $data_ins];

        return DB::insert($query, $values);
    }

    public function edit($req)
    {
        $query = "UPDATE cad_tipos_receitas_variaveis SET descricao_trv = ?, data_receita_trv = ? WHERE cod_tipo_rec_trv = ?";
        $values = [$req->descricao_trv, $req->data_receita_trv, $req->id];
        return DB::update($query, $values);
    }

    public function disable($req)
    {
        $data_upd = date("Y-m-d");
        $query = "UPDATE cad_tipos_receitas_variaveis SET id_ativo_trv = ?, dta_upd_trv = ? WHERE cod_tipo_rec_trv = ?";
        $values = [$req->status, $data_upd, $req->id];
        return DB::update($query, $values);
    }
}
