<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RelReceitaFixaValorModel extends Model
{
    use HasFactory;

    public function listAll($req)
    {
        $query = "SELECT cod_rec_rfv, cod_user_rfv, cod_tipo_rec_rfv, valor_rfv, dta_ins_rfv, dta_upd_rfv
        FROM cad_tipos_receitas_fixas
        JOIN rel_receita_fixa_valor ON (cod_tipo_rec_rfv = cod_tipo_rec_trf)
        WHERE id_ativo_rfv = '1' AND cod_tipo_rec_rfv = ?
        GROUP BY cod_tipo_rec_rfv";
        $values = [$req->id];
        return DB::select($query, $values);
    }

    public function create($req)
    {
        $data_ins = date('Y-m-d');
        $query = "INSERT INTO rel_receita_fixa_valor (cod_user_rfv, cod_tipo_rec_rfv, valor_rfv, dta_ins_rfv)
        VALUES (?, ?, ?, ?)";
        $values = [$req->cod_user_rfv, $req->id, $req->valor_rfv, $data_ins];
        return DB::insert($query, $values);
    }

    public function edit($req)
    {
        $data_upd = date('Y-m-d');   
        $query = "UPDATE rel_receita_fixa_valor SET dta_upd_rfv = ?, id_ativo_rfv = '0' WHERE cod_rec_rfv = ?";
        $values = [$data_upd, $req->id_valor];
        DB::update($query, $values);
        $this->create($req);
    }

    public function disable($req)
    {
        $data_upd = date('Y-m-d');
        $query = "UPDATE rel_receita_fixa_valor SET dta_upd_rfv = ?, id_ativo_rfv = ? WHERE cod_rec_rfv = ?";
        $values = [$data_upd, $req->status, $req->id_valor];
        return DB::update($query, $values);
    }
}
