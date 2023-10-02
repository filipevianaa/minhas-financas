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
        WHERE id_ativo_dfv = '1' AND cod_tipo_desp_dfv = ?
        GROUP BY cod_tipo_desp_dfv";
        $values = [$req->id];
        return DB::select($query, $values);
    }

    public function create($req)
    {
        $data_ins = date('Y-m-d');
        $query = "INSERT INTO rel_despesa_fixa_valor (cod_user_dfv, cod_tipo_desp_dfv, valor_dfv, dta_ins_dfv)
        VALUES (?, ?, ?, ?)";
        $values = [$req->cod_user_dfv, $req->id, $req->valor_dfv, $data_ins];
        return DB::insert($query, $values);
    }

    public function edit($req)
    {
        $data_upd = date('Y-m-d');   
        $query = "UPDATE rel_despesa_fixa_valor SET dta_upd_dfv = '". $data_upd . "', id_ativo_dfv = '0' WHERE cod_desp_dfv = ?";
        $values = [$req->id_valor];
        DB::update($query, $values);
        $this->create($req);
    }

    public function disable($req)
    {
        $data_upd = date('Y-m-d');
        $query = "UPDATE rel_despesa_fixa_valor SET dta_upd_dfv = ?, id_ativo_dfv = ? WHERE cod_desp_dfv = ?";
        $values = [$data_upd, $req->status, $req->id_valor];
        return DB::update($query, $values);
    }
}
