<?php

namespace App\Http\Controllers\Tallerista;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\tallerista;
class SesionController extends Controller
{
    public function index(){
        return view('Tallerista.sesion');
    }

    public function buscar($id){
        $tallerista=tallerista::find($id);
        return $tallerista;
    }

    public function actualizar_tallerista($id){

    }
}
