<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\CadDespesaEspecificaParceladaController as ApiCadDespesaEspecificaParceladaController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CadDespesaEspecificaParceladaController extends Controller
{
    private $api; 

    public function __construct()
    {
        $this->api = new ApiCadDespesaEspecificaParceladaController();
    }
}
