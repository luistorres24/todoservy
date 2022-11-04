<?php

namespace App\Http\Controllers;

use App\Http\Requests\NegocioRequest;
use Illuminate\Http\Request;

class NegociosController extends Controller
{
    public function crearNegocio(NegocioRequest $request)
    {


        return response()->json('prueba');
    }
}
