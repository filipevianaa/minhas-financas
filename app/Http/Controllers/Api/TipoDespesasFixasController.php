<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TipoDespesasFixasModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TipoDespesasFixasController extends Controller
{
    public function index()
    {
        $model = new TipoDespesasFixasModel();
        return $model->listAll();
    }

    public function show(Request $req)
    {
        $model = new TipoDespesasFixasModel();
        return $model->getById($req->id);
    }

    public function create(Request $req)
    {
        $model = new TipoDespesasFixasModel();
        return $model->create($req);

    }
}
