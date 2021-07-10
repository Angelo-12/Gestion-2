<?php

namespace App\Http\Controllers\Tallerista;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SesionController extends Controller
{
    public function index(){
        return view('Tallerista.sesion');
    }
}
