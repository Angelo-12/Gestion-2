<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tallerista;

class AdministradorController extends Controller
{
    public function index(){
        $data = Tallerista::all();

        return view('Administrador.sesion', ['data'=>$data]);
    }

    public function getDatosTallerista($id){
        if($id==1){
            $data=[
                ['pregunta'=>'¿Pregunta 1?', 'res_1'=>'12', 'res_2'=>'39', 'res_3'=>'12', 'res_4'=>'21', 'res_5'=>'1',],
                ['pregunta'=>'¿Pregunta 2?', 'res_1'=>'32', 'res_2'=>'21', 'res_3'=>'15', 'res_4'=>'25', 'res_5'=>'2',],
                ['pregunta'=>'¿Pregunta 3?', 'res_1'=>'42', 'res_2'=>'41', 'res_3'=>'18', 'res_4'=>'10', 'res_5'=>'5',],
                ['pregunta'=>'¿Pregunta 4?', 'res_1'=>'22', 'res_2'=>'23', 'res_3'=>'35', 'res_4'=>'5', 'res_5'=>'13',],
                ['pregunta'=>'¿Pregunta 5?', 'res_1'=>'21', 'res_2'=>'22', 'res_3'=>'22', 'res_4'=>'11', 'res_5'=>'11',],
            ];
        }
        else{
            $data=[
                ['pregunta'=>'¿Pregunta 1?', 'res_1'=>'22', 'res_2'=>'23', 'res_3'=>'12', 'res_4'=>'23', 'res_5'=>'2',],
                ['pregunta'=>'¿Pregunta 2?', 'res_1'=>'22', 'res_2'=>'22', 'res_3'=>'11', 'res_4'=>'15', 'res_5'=>'5',],
                ['pregunta'=>'¿Pregunta 3?', 'res_1'=>'32', 'res_2'=>'43', 'res_3'=>'9', 'res_4'=>'23', 'res_5'=>'10',],
                ['pregunta'=>'¿Pregunta 4?', 'res_1'=>'42', 'res_2'=>'31', 'res_3'=>'32', 'res_4'=>'34', 'res_5'=>'19',],
                ['pregunta'=>'¿Pregunta 5?', 'res_1'=>'11', 'res_2'=>'33', 'res_3'=>'21', 'res_4'=>'31', 'res_5'=>'12',],
            ];
        }

        return $data;
    }

    public function getDatosTallerista2($id){
        if($id==1){
            $data=[
                ['pregunta'=>'¿Pregunta 1?', 'res_1'=>'12', 'res_2'=>'39', 'res_3'=>'12', 'res_4'=>'21', 'res_5'=>'1',],
                ['pregunta'=>'¿Pregunta 2?', 'res_1'=>'32', 'res_2'=>'21', 'res_3'=>'15', 'res_4'=>'25', 'res_5'=>'2',],
                ['pregunta'=>'¿Pregunta 3?', 'res_1'=>'42', 'res_2'=>'41', 'res_3'=>'18', 'res_4'=>'10', 'res_5'=>'5',],
                ['pregunta'=>'¿Pregunta 4?', 'res_1'=>'22', 'res_2'=>'23', 'res_3'=>'35', 'res_4'=>'5', 'res_5'=>'13',],
                ['pregunta'=>'¿Pregunta 5?', 'res_1'=>'21', 'res_2'=>'22', 'res_3'=>'22', 'res_4'=>'11', 'res_5'=>'11',],
            ];
        }
        else{
            $data=[
                ['pregunta'=>'¿Pregunta 1?', 'res_1'=>'22', 'res_2'=>'23', 'res_3'=>'12', 'res_4'=>'23', 'res_5'=>'2',],
                ['pregunta'=>'¿Pregunta 2?', 'res_1'=>'22', 'res_2'=>'22', 'res_3'=>'11', 'res_4'=>'15', 'res_5'=>'5',],
                ['pregunta'=>'¿Pregunta 3?', 'res_1'=>'32', 'res_2'=>'43', 'res_3'=>'9', 'res_4'=>'23', 'res_5'=>'10',],
                ['pregunta'=>'¿Pregunta 4?', 'res_1'=>'42', 'res_2'=>'31', 'res_3'=>'32', 'res_4'=>'34', 'res_5'=>'19',],
                ['pregunta'=>'¿Pregunta 5?', 'res_1'=>'11', 'res_2'=>'33', 'res_3'=>'21', 'res_4'=>'31', 'res_5'=>'12',],
            ];
        }

        return json_encode(['data'=>$data]);
    }

    public function getDatosTallerista3($id){
        if($id==1){
            $data=[
                ['pregunta'=>'¿Pregunta 1?', 'res_1'=>'12', 'res_2'=>'39', 'res_3'=>'12', 'res_4'=>'21', 'res_5'=>'1',],
                ['pregunta'=>'¿Pregunta 2?', 'res_1'=>'32', 'res_2'=>'21', 'res_3'=>'15', 'res_4'=>'25', 'res_5'=>'2',],
                ['pregunta'=>'¿Pregunta 3?', 'res_1'=>'42', 'res_2'=>'41', 'res_3'=>'18', 'res_4'=>'10', 'res_5'=>'5',],
                ['pregunta'=>'¿Pregunta 4?', 'res_1'=>'22', 'res_2'=>'23', 'res_3'=>'35', 'res_4'=>'5', 'res_5'=>'13',],
                ['pregunta'=>'¿Pregunta 5?', 'res_1'=>'21', 'res_2'=>'22', 'res_3'=>'22', 'res_4'=>'11', 'res_5'=>'11',],
            ];
        }
        else{
            $data=[
                ['pregunta'=>'¿Pregunta 1?', 'res_1'=>'22', 'res_2'=>'23', 'res_3'=>'12', 'res_4'=>'23', 'res_5'=>'2',],
                ['pregunta'=>'¿Pregunta 2?', 'res_1'=>'22', 'res_2'=>'22', 'res_3'=>'11', 'res_4'=>'15', 'res_5'=>'5',],
                ['pregunta'=>'¿Pregunta 3?', 'res_1'=>'32', 'res_2'=>'43', 'res_3'=>'9', 'res_4'=>'23', 'res_5'=>'10',],
                ['pregunta'=>'¿Pregunta 4?', 'res_1'=>'42', 'res_2'=>'31', 'res_3'=>'32', 'res_4'=>'34', 'res_5'=>'19',],
                ['pregunta'=>'¿Pregunta 5?', 'res_1'=>'11', 'res_2'=>'33', 'res_3'=>'21', 'res_4'=>'31', 'res_5'=>'12',],
            ];
        }

        return json_encode(['data'=>$data]);
    }
}
