<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\CadReceitaEspecificaPontualController as ApiCadReceitaEspecificaPontualController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CadReceitaEspecificaPontualController extends Controller
{
    private $api; 

    public function __construct()
    {
        $this->api = new ApiCadReceitaEspecificaPontualController();
    }
}
