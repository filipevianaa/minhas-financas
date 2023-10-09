<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\TipoDespesasVariaveisController as ApiTipoDespesasVariaveisController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TipoDespesasVariaveisController extends Controller
{
    private $api;

    public function __construct()
    {
        $this->api = new ApiTipoDespesasVariaveisController();
    }
}
