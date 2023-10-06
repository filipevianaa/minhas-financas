<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CadReceitaEspecificaPontualModel extends Model
{
    use HasFactory;

    public function listAll()
    {
        $query = "SELECT * FROM cad_receitas_especificas_pontuais WHERE cod_user_rep = 1 AND id_ativo_rep = '1'";
        return DB::select($query);
    }

    public function getById($req)
    {
        $query = "SELECT * FROM cad_receitas_especificas_pontuais WHERE cod_rec_rep = ?";
        $values = [$req->id];
        return DB::select($query, $values);
    }

    public function create($req)
    {
        $data_ins = date('Y-m-d');
        $query = "INSERT INTO cad_receitas_especificas_pontuais (cod_user_rep, descricao_rep, valor_rep, dta_ins_rep)
        VALUES (?, ?, ?, ?)";
        $values = [$req->cod_user_rep, $req->descricao_rep, $req->valor_rep, $data_ins];
        return DB::insert($query, $values);
    }

    public function edit($req)
    {
        $data_upd = date('Y-m-d');
        $query = "UPDATE cad_receitas_especificas_pontuais SET descricao_rep = ?, valor_rep = ?, dta_upd_rep = ? WHERE cod_rec_rep = ?";
        $values = [$req->descricao_rep, $req->valor_rep, $data_upd,  $req->id];
        return DB::update($query, $values);
    }

    public function disable($req)
    {
        $query = "UPDATE cad_receitas_especificas_pontuais SET id_ativo_rep = ? WHERE cod_rec_rep = ?";
        $values = [$req->status, $req->id];
        return DB::update($query, $values);
    }
}
