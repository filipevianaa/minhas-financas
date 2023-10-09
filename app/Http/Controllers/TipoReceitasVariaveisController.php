<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\TipoReceitasVariaveisController as ApiTipoReceitasVariaveisController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TipoReceitasVariaveisController extends Controller
{
    private $api; 

    public function __construct()
    {
        $this->api = new ApiTipoReceitasVariaveisController();
    }
}
