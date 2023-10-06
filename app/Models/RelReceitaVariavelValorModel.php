<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RelReceitaVariavelValorModel extends Model
{
    use HasFactory;

    public function listAll($req)
    {
        $query = "SELECT cod_rec_rvv, cod_user_rvv, cod_tipo_rec_rvv, valor_rvv, dta_ins_rvv, dta_upd_rvv
        FROM cad_tipos_receitas_variaveis
        JOIN rel_receita_variavel_valor ON (cod_tipo_rec_rvv = cod_tipo_rec_trv)
        WHERE id_ativo_rvv = '1' AND cod_tipo_rec_rvv = ?
        GROUP BY cod_tipo_rec_rvv";
        $values = [$req->id];
        return DB::select($query, $values);
    }

    public function create($req)
    {
        $data_ins = date('Y-m-d');
        $query = "INSERT INTO rel_receita_variavel_valor (cod_user_rvv, cod_tipo_rec_rvv, valor_rvv, dta_ins_rvv)
        VALUES (?, ?, ?, ?)";
        $values = [$req->cod_user_rvv, $req->id, $req->valor_rvv, $data_ins];
        return DB::insert($query, $values);
    }

    public function edit($req)
    {
        $data_upd = date('Y-m-d');   
        $query = "UPDATE rel_receita_variavel_valor SET dta_upd_rvv = ?, id_ativo_rvv = '0' WHERE cod_rec_rvv = ?";
        $values = [$data_upd, $req->id_valor];
        DB::update($query, $values);
        $this->create($req);
    }

    public function disable($req)
    {
        $data_upd = date('Y-m-d');
        $query = "UPDATE rel_receita_variavel_valor SET dta_upd_rvv = ?, id_ativo_rvv = ? WHERE cod_rec_rvv = ?";
        $values = [$data_upd, $req->status, $req->id_valor];
        return DB::update($query, $values);
    }
}
