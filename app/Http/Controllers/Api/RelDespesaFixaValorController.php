<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RelDespesaFixaValorModel;
use Illuminate\Http\Request;

class RelDespesaFixaValorController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = new RelDespesaFixaValorModel();
    }

    public function index(Request $req)
    {
        return $this->model->listAll($req);
    }

    public function create(Request $req)
    {
        return $this->model->create($req);
    }
}
