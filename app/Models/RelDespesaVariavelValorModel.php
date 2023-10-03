<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RelDespesaVariavelValorModel extends Model
{
    use HasFactory;

    public function listAll($req)
    {
        $query = "SELECT cod_desp_dvv, cod_user_dvv, cod_tipo_desp_dvv, valor_dvv, dta_ins_dvv, dta_upd_dvv
        FROM cad_tipos_despesas_variaveis
        JOIN rel_despesa_variavel_valor ON (cod_tipo_desp_dvv = cod_tipo_desp_tdv)
        WHERE id_ativo_dvv = '1' AND cod_tipo_desp_dvv = ?
        GROUP BY cod_tipo_desp_dvv";
        $values = [$req->id];
        return DB::select($query, $values);
    }

    public function create($req)
    {
        $data_ins = date('Y-m-d');
        $query = "INSERT INTO rel_despesa_variavel_valor (cod_user_dvv, cod_tipo_desp_dvv, valor_dvv, dta_ins_dvv)
        VALUES (?, ?, ?, ?)";
        $values = [$req->cod_user_dvv, $req->id, $req->valor_dvv, $data_ins];
        return DB::insert($query, $values);
    }

    public function edit($req)
    {
        $data_upd = date('Y-m-d');   
        $query = "UPDATE rel_despesa_variavel_valor SET valor_dvv = ?, dta_upd_dvv = '". $data_upd . "' WHERE cod_desp_dvv = ?";
        $values = [$req->valor_dvv, $req->id_valor];
        DB::update($query, $values);
    }

    public function disable($req)
    {
        $data_upd = date('Y-m-d');
        $query = "UPDATE rel_despesa_variavel_valor SET dta_upd_dvv = ?, id_ativo_dvv = ? WHERE cod_desp_dvv = ?";
        $values = [$data_upd, $req->status, $req->id_valor];
        return DB::update($query, $values);
    }
}
