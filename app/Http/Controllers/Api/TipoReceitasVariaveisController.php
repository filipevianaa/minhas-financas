<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TipoReceitasVariaveisModel;
use Illuminate\Http\Request;

class TipoReceitasVariaveisController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = new TipoReceitasVariaveisModel();
    }

    public function index()
    {
        return $this->model->listAll();
    }

    public function show(Request $req)
    {
        return $this->model->getById($req->id);
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
