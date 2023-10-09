<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\TipoReceitasFixasController as ApiTipoReceitasFixasController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TipoReceitasFixasController extends Controller
{
    private $api; 

    public function __construct()
    {
        $this->api = new ApiTipoReceitasFixasController();
    }
}
