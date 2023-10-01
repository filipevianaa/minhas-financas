<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TipoDespesasVariaveisModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TipoDespesasVariaveisController extends Controller
{
    public function index()
    {
        $model = new TipoDespesasVariaveisModel();
        return $model->listAll();
    }

    public function show(Request $req)
    {
        $model = new TipoDespesasVariaveisModel();
        return $model->getById($req->id);
    }

    public function create(Request $req)
    {
        $model = new TipoDespesasVariaveisModel();
        return $model->create($req);
    }

    public function edit(Request $req)
    {
        $model = new TipoDespesasVariaveisModel();
        return $model->edit($req);
    }

    public function disable(Request $req)
    {
        $model = new TipoDespesasVariaveisModel();
        return $model->disable($req);
    }
}
