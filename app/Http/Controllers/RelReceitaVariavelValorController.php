<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\RelReceitaVariavelValorController as ApiRelReceitaVariavelValorController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RelReceitaVariavelValorController extends Controller
{
    private $api; 

    public function __construct()
    {
        $this->api = new ApiRelReceitaVariavelValorController();
    }
}
