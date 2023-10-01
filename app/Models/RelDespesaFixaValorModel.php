<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RelDespesaFixaValorModel extends Model
{
    use HasFactory;

    public function listAll($req)
    {
        $query = "SELECT cod_desp_dfv, cod_user_dfv, cod_tipo_desp_dfv, valor_dfv, dta_ins_dfv, dta_upd_dfv
        FROM cad_tipos_despesas_fixas
        JOIN rel_despesa_fixa_valor ON (cod_tipo_desp_dfv = cod_tipo_desp_tdf)
        WHERE cod_desp_dfv IN (SELECT MAX(cod_desp_dfv) FROM rel_despesa_fixa_valor
        group by cod_tipo_desp_dfv) AND cod_tipo_desp_dfv = ?
        GROUP BY cod_tipo_desp_dfv";
        $values = [$req->id];
        return DB::select($query, $values);
    }

    public function create($req)
    {
        $query = "INSERT INTO rel_despesa_fixa_valor (cod_user_dfv, cod_tipo_desp_dfv, valor_dfv, dta_ins_dfv, dta_upd_dfv)
        VALUES (?, ?, ?, ?, ?)";
        $values = [$req->cod_user_dfv, $req->id, $req->valor_dfv, $req->dta_ins_dfv, $req->dta_upd_dfv];
        return DB::insert($query, $values);
    }
}
