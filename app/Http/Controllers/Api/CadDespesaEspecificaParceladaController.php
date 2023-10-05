<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CadDespesaEspecificaParceladaModel;
use Illuminate\Http\Request;

class CadDespesaEspecificaParceladaController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = new CadDespesaEspecificaParceladaModel();
    }

    public function index(Request $req)
    {
        return $this->model->listAll($req);
    }

    public function show(Request $req)
    {
        return $this->model->getById($req);
    }

    public function create(Request $req)
    {
        return $this->model->create($req);
    }

    public function edit(Request $req)
    {
        return $this->model->edit($req);
    }

    public function disable(Request $req)
    {
        return $this->model->disable($req);
    }
}
