<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\RelReceitaFixaValorController as ApiRelReceitaFixaValorController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RelReceitaFixaValorController extends Controller
{
    private $api; 

    public function __construct()
    {
        $this->api = new ApiRelReceitaFixaValorController();
    }
}
