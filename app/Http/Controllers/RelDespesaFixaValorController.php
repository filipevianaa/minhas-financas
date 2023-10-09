<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\RelDespesaFixaValorController as ApiRelDespesaFixaValorController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RelDespesaFixaValorController extends Controller
{
    private $api; 

    public function __construct()
    {
        $this->api = new ApiRelDespesaFixaValorController();
    }
}
