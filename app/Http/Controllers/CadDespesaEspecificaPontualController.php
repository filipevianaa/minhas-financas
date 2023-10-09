<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\CadDespesaEspecificaPontualController as ApiCadDespesaEspecificaPontualController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CadDespesaEspecificaPontualController extends Controller
{
    private $api; 

    public function __construct()
    {
        $this->api = new ApiCadDespesaEspecificaPontualController();
    }
}
