<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AdministradorController extends Controller
{
    public function index(){
        $data = User::where('id_tipo_usuario', 2)->get();

        return view('Administrador.sesion', ['data'=>$data]);
    }
}
