<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CadDespesaEspecificaPontualModel extends Model
{
    use HasFactory;

    public function listAll()
    {
        $query = "SELECT * FROM cad_despesas_especificas_pontuais WHERE cod_user_dep = 1 AND id_ativo_dep = '1'";
        return DB::select($query);
    }

    public function getById($req)
    {
        $query = "SELECT * FROM cad_despesas_especificas_pontuais WHERE cod_desp_dep = ?";
        $values = [$req->id];
        return DB::select($query, $values);
    }

    public function create($req)
    {
        $data_ins = date('Y-m-d');
        $query = "INSERT INTO cad_despesas_especificas_pontuais (cod_user_dep, descricao_dep, valor_dep, dta_ins_dep)
        VALUES (?, ?, ?, ?)";
        $values = [$req->cod_user_dep, $req->descricao_dep, $req->valor_dep, $data_ins];
        return DB::insert($query, $values);
    }

    public function edit($req)
    {
        $data_upd = date('Y-m-d');
        $query = "UPDATE cad_despesas_especificas_pontuais SET descricao_dep = ?, valor_dep = ?, dta_upd_dep = ? WHERE cod_desp_dep = ?";
        $values = [$req->descricao_dep, $req->valor_dep, $data_upd,  $req->id];
        return DB::update($query, $values);
    }

    public function disable($req)
    {
        $query = "UPDATE cad_despesas_especificas_pontuais SET id_ativo_dep = ? WHERE cod_desp_dep = ?";
        $values = [$req->status, $req->id];
        return DB::update($query, $values);
    }
}
