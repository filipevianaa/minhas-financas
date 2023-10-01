<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\TipoDespesasFixasController as ApiTipoDespesasFixasController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TipoDespesasFixasController extends Controller
{
    private $api;

    public function __construct()
    {
        $this->api = new ApiTipoDespesasFixasController();
    }

    public function index()
    {
        $tiposDespesasFixas = $this->api->index();
        dd($tiposDespesasFixas);
    }
}
