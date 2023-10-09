<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\RelDespesaVariavelValorController as ApiRelDespesaVariavelValorController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RelDespesaVariavelValorController extends Controller
{
    private $api; 

    public function __construct()
    {
        $this->api = new ApiRelDespesaVariavelValorController();
    }
}
