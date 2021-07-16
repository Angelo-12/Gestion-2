<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tallerista;
use App\Models\Encuesta;
use App\Models\Respuestas;
use App\Models\Preguntas;
use Illuminate\Support\Facades\DB;

class AdministradorController extends Controller
{
    public function index(){
        $data = Tallerista::all();

        $sesiones = DB::select(DB::raw('
            SELECT DISTINCT sesion 
            FROM encuesta
        '));      

        return view('Administrador.sesion', ['data'=>$data, 'sesiones'=>$sesiones]);
    }

    public function getDatosTallerista($id, $sesion){
        $preguntas = Preguntas::select('pregunta')->get();

        if($id!=0 && $sesion!=0){
            $res1 = DB::select(DB::raw('
                    SELECT
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND sesion='.$sesion.' AND pregunta=1 AND respuesta=1) AS "p1_r1",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND sesion='.$sesion.' AND pregunta=1 AND respuesta=2) AS "p1_r2",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND sesion='.$sesion.' AND pregunta=1 AND respuesta=3) AS "p1_r3",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND sesion='.$sesion.' AND pregunta=1 AND respuesta=4) AS "p1_r4",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND sesion='.$sesion.' AND pregunta=1 AND respuesta=5) AS "p1_r5",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND sesion='.$sesion.' AND pregunta=2 AND respuesta=1) AS "p2_r1",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND sesion='.$sesion.' AND pregunta=2 AND respuesta=2) AS "p2_r2",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND sesion='.$sesion.' AND pregunta=2 AND respuesta=3) AS "p2_r3",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND sesion='.$sesion.' AND pregunta=2 AND respuesta=4) AS "p2_r4",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND sesion='.$sesion.' AND pregunta=2 AND respuesta=5) AS "p2_r5",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND sesion='.$sesion.' AND pregunta=3 AND respuesta=1) AS "p3_r1",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND sesion='.$sesion.' AND pregunta=3 AND respuesta=2) AS "p3_r2",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND sesion='.$sesion.' AND pregunta=3 AND respuesta=3) AS "p3_r3",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND sesion='.$sesion.' AND pregunta=3 AND respuesta=4) AS "p3_r4",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND sesion='.$sesion.' AND pregunta=3 AND respuesta=5) AS "p3_r5",                
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND sesion='.$sesion.' AND pregunta=4 AND respuesta=1) AS "p4_r1",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND sesion='.$sesion.' AND pregunta=4 AND respuesta=2) AS "p4_r2",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND sesion='.$sesion.' AND pregunta=4 AND respuesta=3) AS "p4_r3",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND sesion='.$sesion.' AND pregunta=4 AND respuesta=4) AS "p4_r4",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND sesion='.$sesion.' AND pregunta=4 AND respuesta=5) AS "p4_r5",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND sesion='.$sesion.' AND pregunta=5 AND respuesta=1) AS "p5_r1",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND sesion='.$sesion.' AND pregunta=5 AND respuesta=2) AS "p5_r2",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND sesion='.$sesion.' AND pregunta=5 AND respuesta=3) AS "p5_r3",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND sesion='.$sesion.' AND pregunta=5 AND respuesta=4) AS "p5_r4",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND sesion='.$sesion.' AND pregunta=5 AND respuesta=5) AS "p5_r5"
                ')
            );
        }
        else if($id!=0 && $sesion==0){
            $res1 = DB::select(DB::raw('
                    SELECT
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND pregunta=1 AND respuesta=1) AS "p1_r1",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND pregunta=1 AND respuesta=2) AS "p1_r2",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND pregunta=1 AND respuesta=3) AS "p1_r3",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND pregunta=1 AND respuesta=4) AS "p1_r4",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND pregunta=1 AND respuesta=5) AS "p1_r5",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND pregunta=2 AND respuesta=1) AS "p2_r1",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND pregunta=2 AND respuesta=2) AS "p2_r2",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND pregunta=2 AND respuesta=3) AS "p2_r3",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND pregunta=2 AND respuesta=4) AS "p2_r4",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND pregunta=2 AND respuesta=5) AS "p2_r5",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND pregunta=3 AND respuesta=1) AS "p3_r1",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND pregunta=3 AND respuesta=2) AS "p3_r2",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND pregunta=3 AND respuesta=3) AS "p3_r3",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND pregunta=3 AND respuesta=4) AS "p3_r4",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND pregunta=3 AND respuesta=5) AS "p3_r5",                
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND pregunta=4 AND respuesta=1) AS "p4_r1",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND pregunta=4 AND respuesta=2) AS "p4_r2",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND pregunta=4 AND respuesta=3) AS "p4_r3",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND pregunta=4 AND respuesta=4) AS "p4_r4",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND pregunta=4 AND respuesta=5) AS "p4_r5",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND pregunta=5 AND respuesta=1) AS "p5_r1",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND pregunta=5 AND respuesta=2) AS "p5_r2",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND pregunta=5 AND respuesta=3) AS "p5_r3",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND pregunta=5 AND respuesta=4) AS "p5_r4",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND pregunta=5 AND respuesta=5) AS "p5_r5"
                ')
            );
        }
        else if($id==0 && $sesion!=0){
            $res1 = DB::select(DB::raw('
                    SELECT
                        (SELECT COUNT(*) FROM encuesta WHERE sesion='.$sesion.' AND pregunta=1 AND respuesta=1) AS "p1_r1",
                        (SELECT COUNT(*) FROM encuesta WHERE sesion='.$sesion.' AND pregunta=1 AND respuesta=2) AS "p1_r2",
                        (SELECT COUNT(*) FROM encuesta WHERE sesion='.$sesion.' AND pregunta=1 AND respuesta=3) AS "p1_r3",
                        (SELECT COUNT(*) FROM encuesta WHERE sesion='.$sesion.' AND pregunta=1 AND respuesta=4) AS "p1_r4",
                        (SELECT COUNT(*) FROM encuesta WHERE sesion='.$sesion.' AND pregunta=1 AND respuesta=5) AS "p1_r5",
                        (SELECT COUNT(*) FROM encuesta WHERE sesion='.$sesion.' AND pregunta=2 AND respuesta=1) AS "p2_r1",
                        (SELECT COUNT(*) FROM encuesta WHERE sesion='.$sesion.' AND pregunta=2 AND respuesta=2) AS "p2_r2",
                        (SELECT COUNT(*) FROM encuesta WHERE sesion='.$sesion.' AND pregunta=2 AND respuesta=3) AS "p2_r3",
                        (SELECT COUNT(*) FROM encuesta WHERE sesion='.$sesion.' AND pregunta=2 AND respuesta=4) AS "p2_r4",
                        (SELECT COUNT(*) FROM encuesta WHERE sesion='.$sesion.' AND pregunta=2 AND respuesta=5) AS "p2_r5",
                        (SELECT COUNT(*) FROM encuesta WHERE sesion='.$sesion.' AND pregunta=3 AND respuesta=1) AS "p3_r1",
                        (SELECT COUNT(*) FROM encuesta WHERE sesion='.$sesion.' AND pregunta=3 AND respuesta=2) AS "p3_r2",
                        (SELECT COUNT(*) FROM encuesta WHERE sesion='.$sesion.' AND pregunta=3 AND respuesta=3) AS "p3_r3",
                        (SELECT COUNT(*) FROM encuesta WHERE sesion='.$sesion.' AND pregunta=3 AND respuesta=4) AS "p3_r4",
                        (SELECT COUNT(*) FROM encuesta WHERE sesion='.$sesion.' AND pregunta=3 AND respuesta=5) AS "p3_r5",                
                        (SELECT COUNT(*) FROM encuesta WHERE sesion='.$sesion.' AND pregunta=4 AND respuesta=1) AS "p4_r1",
                        (SELECT COUNT(*) FROM encuesta WHERE sesion='.$sesion.' AND pregunta=4 AND respuesta=2) AS "p4_r2",
                        (SELECT COUNT(*) FROM encuesta WHERE sesion='.$sesion.' AND pregunta=4 AND respuesta=3) AS "p4_r3",
                        (SELECT COUNT(*) FROM encuesta WHERE sesion='.$sesion.' AND pregunta=4 AND respuesta=4) AS "p4_r4",
                        (SELECT COUNT(*) FROM encuesta WHERE sesion='.$sesion.' AND pregunta=4 AND respuesta=5) AS "p4_r5",
                        (SELECT COUNT(*) FROM encuesta WHERE sesion='.$sesion.' AND pregunta=5 AND respuesta=1) AS "p5_r1",
                        (SELECT COUNT(*) FROM encuesta WHERE sesion='.$sesion.' AND pregunta=5 AND respuesta=2) AS "p5_r2",
                        (SELECT COUNT(*) FROM encuesta WHERE sesion='.$sesion.' AND pregunta=5 AND respuesta=3) AS "p5_r3",
                        (SELECT COUNT(*) FROM encuesta WHERE sesion='.$sesion.' AND pregunta=5 AND respuesta=4) AS "p5_r4",
                        (SELECT COUNT(*) FROM encuesta WHERE sesion='.$sesion.' AND pregunta=5 AND respuesta=5) AS "p5_r5"
                ')
            );
        }
        else{
            $res1 = DB::select(DB::raw('
                    SELECT
                        (SELECT COUNT(*) FROM encuesta WHERE pregunta=1 AND respuesta=1) AS "p1_r1",
                        (SELECT COUNT(*) FROM encuesta WHERE pregunta=1 AND respuesta=2) AS "p1_r2",
                        (SELECT COUNT(*) FROM encuesta WHERE pregunta=1 AND respuesta=3) AS "p1_r3",
                        (SELECT COUNT(*) FROM encuesta WHERE pregunta=1 AND respuesta=4) AS "p1_r4",
                        (SELECT COUNT(*) FROM encuesta WHERE pregunta=1 AND respuesta=5) AS "p1_r5",
                        (SELECT COUNT(*) FROM encuesta WHERE pregunta=2 AND respuesta=1) AS "p2_r1",
                        (SELECT COUNT(*) FROM encuesta WHERE pregunta=2 AND respuesta=2) AS "p2_r2",
                        (SELECT COUNT(*) FROM encuesta WHERE pregunta=2 AND respuesta=3) AS "p2_r3",
                        (SELECT COUNT(*) FROM encuesta WHERE pregunta=2 AND respuesta=4) AS "p2_r4",
                        (SELECT COUNT(*) FROM encuesta WHERE pregunta=2 AND respuesta=5) AS "p2_r5",
                        (SELECT COUNT(*) FROM encuesta WHERE pregunta=3 AND respuesta=1) AS "p3_r1",
                        (SELECT COUNT(*) FROM encuesta WHERE pregunta=3 AND respuesta=2) AS "p3_r2",
                        (SELECT COUNT(*) FROM encuesta WHERE pregunta=3 AND respuesta=3) AS "p3_r3",
                        (SELECT COUNT(*) FROM encuesta WHERE pregunta=3 AND respuesta=4) AS "p3_r4",
                        (SELECT COUNT(*) FROM encuesta WHERE pregunta=3 AND respuesta=5) AS "p3_r5",                
                        (SELECT COUNT(*) FROM encuesta WHERE pregunta=4 AND respuesta=1) AS "p4_r1",
                        (SELECT COUNT(*) FROM encuesta WHERE pregunta=4 AND respuesta=2) AS "p4_r2",
                        (SELECT COUNT(*) FROM encuesta WHERE pregunta=4 AND respuesta=3) AS "p4_r3",
                        (SELECT COUNT(*) FROM encuesta WHERE pregunta=4 AND respuesta=4) AS "p4_r4",
                        (SELECT COUNT(*) FROM encuesta WHERE pregunta=4 AND respuesta=5) AS "p4_r5",
                        (SELECT COUNT(*) FROM encuesta WHERE pregunta=5 AND respuesta=1) AS "p5_r1",
                        (SELECT COUNT(*) FROM encuesta WHERE pregunta=5 AND respuesta=2) AS "p5_r2",
                        (SELECT COUNT(*) FROM encuesta WHERE pregunta=5 AND respuesta=3) AS "p5_r3",
                        (SELECT COUNT(*) FROM encuesta WHERE pregunta=5 AND respuesta=4) AS "p5_r4",
                        (SELECT COUNT(*) FROM encuesta WHERE pregunta=5 AND respuesta=5) AS "p5_r5"
                ')
            );
        }
        

        $res = (array) $res1[0];
        $data = [];
        

        for($i=1; $i<=5 ; $i++) { 
            $nuevo = [
                'pregunta'=>$preguntas[$i-1]->pregunta, 
                'res_1' => $res['p'.$i.'_r1'], 
                'res_2' => $res['p'.$i.'_r2'], 
                'res_3' => $res['p'.$i.'_r3'],
                'res_4' => $res['p'.$i.'_r4'], 
                'res_5' => $res['p'.$i.'_r5'], 
            ];
            array_push($data, $nuevo);
        }
        

        return $data;
    }

    public function getDatosTallerista2($id){
        if($id==1){
            $data=[
                ['pregunta'=>'¿Pregunta 1?', 'res_1'=>'0', 'res_2'=>'39', 'res_3'=>'12', 'res_4'=>'21', 'res_5'=>'1',],
                ['pregunta'=>'¿Pregunta 2?', 'res_1'=>'0', 'res_2'=>'21', 'res_3'=>'15', 'res_4'=>'25', 'res_5'=>'2',],
                ['pregunta'=>'¿Pregunta 3?', 'res_1'=>'0', 'res_2'=>'41', 'res_3'=>'18', 'res_4'=>'10', 'res_5'=>'5',],
                ['pregunta'=>'¿Pregunta 4?', 'res_1'=>'0', 'res_2'=>'23', 'res_3'=>'35', 'res_4'=>'5', 'res_5'=>'13',],
                ['pregunta'=>'¿Pregunta 5?', 'res_1'=>'0', 'res_2'=>'22', 'res_3'=>'22', 'res_4'=>'11', 'res_5'=>'11',],
            ];
        }
        else{
            $data=[
                ['pregunta'=>'¿Pregunta 1?', 'res_1'=>'0', 'res_2'=>'23', 'res_3'=>'12', 'res_4'=>'23', 'res_5'=>'2',],
                ['pregunta'=>'¿Pregunta 2?', 'res_1'=>'0', 'res_2'=>'22', 'res_3'=>'11', 'res_4'=>'15', 'res_5'=>'5',],
                ['pregunta'=>'¿Pregunta 3?', 'res_1'=>'0', 'res_2'=>'43', 'res_3'=>'9', 'res_4'=>'23', 'res_5'=>'10',],
                ['pregunta'=>'¿Pregunta 4?', 'res_1'=>'0', 'res_2'=>'31', 'res_3'=>'32', 'res_4'=>'34', 'res_5'=>'19',],
                ['pregunta'=>'¿Pregunta 5?', 'res_1'=>'0', 'res_2'=>'33', 'res_3'=>'21', 'res_4'=>'31', 'res_5'=>'12',],
            ];
        }

        return json_encode(['data'=>$data]);
    }

    public function getDatosTallerista3($id, $sesion){
        $preguntas = Preguntas::select('pregunta')->get();
        $respuestas = Respuestas::select('respuesta')->get();

        if($id!=0 && $sesion!=0){
            $res1 = DB::select(DB::raw('
                    SELECT
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND sesion='.$sesion.' AND pregunta=1 AND respuesta=1) AS "p1_r1",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND sesion='.$sesion.' AND pregunta=1 AND respuesta=2) AS "p1_r2",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND sesion='.$sesion.' AND pregunta=1 AND respuesta=3) AS "p1_r3",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND sesion='.$sesion.' AND pregunta=1 AND respuesta=4) AS "p1_r4",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND sesion='.$sesion.' AND pregunta=1 AND respuesta=5) AS "p1_r5",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND sesion='.$sesion.' AND pregunta=2 AND respuesta=1) AS "p2_r1",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND sesion='.$sesion.' AND pregunta=2 AND respuesta=2) AS "p2_r2",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND sesion='.$sesion.' AND pregunta=2 AND respuesta=3) AS "p2_r3",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND sesion='.$sesion.' AND pregunta=2 AND respuesta=4) AS "p2_r4",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND sesion='.$sesion.' AND pregunta=2 AND respuesta=5) AS "p2_r5",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND sesion='.$sesion.' AND pregunta=3 AND respuesta=1) AS "p3_r1",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND sesion='.$sesion.' AND pregunta=3 AND respuesta=2) AS "p3_r2",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND sesion='.$sesion.' AND pregunta=3 AND respuesta=3) AS "p3_r3",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND sesion='.$sesion.' AND pregunta=3 AND respuesta=4) AS "p3_r4",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND sesion='.$sesion.' AND pregunta=3 AND respuesta=5) AS "p3_r5",                
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND sesion='.$sesion.' AND pregunta=4 AND respuesta=1) AS "p4_r1",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND sesion='.$sesion.' AND pregunta=4 AND respuesta=2) AS "p4_r2",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND sesion='.$sesion.' AND pregunta=4 AND respuesta=3) AS "p4_r3",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND sesion='.$sesion.' AND pregunta=4 AND respuesta=4) AS "p4_r4",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND sesion='.$sesion.' AND pregunta=4 AND respuesta=5) AS "p4_r5",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND sesion='.$sesion.' AND pregunta=5 AND respuesta=1) AS "p5_r1",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND sesion='.$sesion.' AND pregunta=5 AND respuesta=2) AS "p5_r2",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND sesion='.$sesion.' AND pregunta=5 AND respuesta=3) AS "p5_r3",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND sesion='.$sesion.' AND pregunta=5 AND respuesta=4) AS "p5_r4",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND sesion='.$sesion.' AND pregunta=5 AND respuesta=5) AS "p5_r5"
                ')
            );
        }
        else if($id!=0 && $sesion==0){
            $res1 = DB::select(DB::raw('
                    SELECT
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND pregunta=1 AND respuesta=1) AS "p1_r1",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND pregunta=1 AND respuesta=2) AS "p1_r2",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND pregunta=1 AND respuesta=3) AS "p1_r3",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND pregunta=1 AND respuesta=4) AS "p1_r4",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND pregunta=1 AND respuesta=5) AS "p1_r5",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND pregunta=2 AND respuesta=1) AS "p2_r1",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND pregunta=2 AND respuesta=2) AS "p2_r2",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND pregunta=2 AND respuesta=3) AS "p2_r3",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND pregunta=2 AND respuesta=4) AS "p2_r4",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND pregunta=2 AND respuesta=5) AS "p2_r5",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND pregunta=3 AND respuesta=1) AS "p3_r1",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND pregunta=3 AND respuesta=2) AS "p3_r2",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND pregunta=3 AND respuesta=3) AS "p3_r3",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND pregunta=3 AND respuesta=4) AS "p3_r4",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND pregunta=3 AND respuesta=5) AS "p3_r5",                
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND pregunta=4 AND respuesta=1) AS "p4_r1",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND pregunta=4 AND respuesta=2) AS "p4_r2",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND pregunta=4 AND respuesta=3) AS "p4_r3",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND pregunta=4 AND respuesta=4) AS "p4_r4",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND pregunta=4 AND respuesta=5) AS "p4_r5",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND pregunta=5 AND respuesta=1) AS "p5_r1",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND pregunta=5 AND respuesta=2) AS "p5_r2",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND pregunta=5 AND respuesta=3) AS "p5_r3",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND pregunta=5 AND respuesta=4) AS "p5_r4",
                        (SELECT COUNT(*) FROM encuesta WHERE id_tallerista='.$id.' AND pregunta=5 AND respuesta=5) AS "p5_r5"
                ')
            );
        }
        else if($id==0 && $sesion!=0){
            $res1 = DB::select(DB::raw('
                    SELECT
                        (SELECT COUNT(*) FROM encuesta WHERE sesion='.$sesion.' AND pregunta=1 AND respuesta=1) AS "p1_r1",
                        (SELECT COUNT(*) FROM encuesta WHERE sesion='.$sesion.' AND pregunta=1 AND respuesta=2) AS "p1_r2",
                        (SELECT COUNT(*) FROM encuesta WHERE sesion='.$sesion.' AND pregunta=1 AND respuesta=3) AS "p1_r3",
                        (SELECT COUNT(*) FROM encuesta WHERE sesion='.$sesion.' AND pregunta=1 AND respuesta=4) AS "p1_r4",
                        (SELECT COUNT(*) FROM encuesta WHERE sesion='.$sesion.' AND pregunta=1 AND respuesta=5) AS "p1_r5",
                        (SELECT COUNT(*) FROM encuesta WHERE sesion='.$sesion.' AND pregunta=2 AND respuesta=1) AS "p2_r1",
                        (SELECT COUNT(*) FROM encuesta WHERE sesion='.$sesion.' AND pregunta=2 AND respuesta=2) AS "p2_r2",
                        (SELECT COUNT(*) FROM encuesta WHERE sesion='.$sesion.' AND pregunta=2 AND respuesta=3) AS "p2_r3",
                        (SELECT COUNT(*) FROM encuesta WHERE sesion='.$sesion.' AND pregunta=2 AND respuesta=4) AS "p2_r4",
                        (SELECT COUNT(*) FROM encuesta WHERE sesion='.$sesion.' AND pregunta=2 AND respuesta=5) AS "p2_r5",
                        (SELECT COUNT(*) FROM encuesta WHERE sesion='.$sesion.' AND pregunta=3 AND respuesta=1) AS "p3_r1",
                        (SELECT COUNT(*) FROM encuesta WHERE sesion='.$sesion.' AND pregunta=3 AND respuesta=2) AS "p3_r2",
                        (SELECT COUNT(*) FROM encuesta WHERE sesion='.$sesion.' AND pregunta=3 AND respuesta=3) AS "p3_r3",
                        (SELECT COUNT(*) FROM encuesta WHERE sesion='.$sesion.' AND pregunta=3 AND respuesta=4) AS "p3_r4",
                        (SELECT COUNT(*) FROM encuesta WHERE sesion='.$sesion.' AND pregunta=3 AND respuesta=5) AS "p3_r5",                
                        (SELECT COUNT(*) FROM encuesta WHERE sesion='.$sesion.' AND pregunta=4 AND respuesta=1) AS "p4_r1",
                        (SELECT COUNT(*) FROM encuesta WHERE sesion='.$sesion.' AND pregunta=4 AND respuesta=2) AS "p4_r2",
                        (SELECT COUNT(*) FROM encuesta WHERE sesion='.$sesion.' AND pregunta=4 AND respuesta=3) AS "p4_r3",
                        (SELECT COUNT(*) FROM encuesta WHERE sesion='.$sesion.' AND pregunta=4 AND respuesta=4) AS "p4_r4",
                        (SELECT COUNT(*) FROM encuesta WHERE sesion='.$sesion.' AND pregunta=4 AND respuesta=5) AS "p4_r5",
                        (SELECT COUNT(*) FROM encuesta WHERE sesion='.$sesion.' AND pregunta=5 AND respuesta=1) AS "p5_r1",
                        (SELECT COUNT(*) FROM encuesta WHERE sesion='.$sesion.' AND pregunta=5 AND respuesta=2) AS "p5_r2",
                        (SELECT COUNT(*) FROM encuesta WHERE sesion='.$sesion.' AND pregunta=5 AND respuesta=3) AS "p5_r3",
                        (SELECT COUNT(*) FROM encuesta WHERE sesion='.$sesion.' AND pregunta=5 AND respuesta=4) AS "p5_r4",
                        (SELECT COUNT(*) FROM encuesta WHERE sesion='.$sesion.' AND pregunta=5 AND respuesta=5) AS "p5_r5"
                ')
            );
        }
        else{
            $res1 = DB::select(DB::raw('
                    SELECT
                        (SELECT COUNT(*) FROM encuesta WHERE pregunta=1 AND respuesta=1) AS "p1_r1",
                        (SELECT COUNT(*) FROM encuesta WHERE pregunta=1 AND respuesta=2) AS "p1_r2",
                        (SELECT COUNT(*) FROM encuesta WHERE pregunta=1 AND respuesta=3) AS "p1_r3",
                        (SELECT COUNT(*) FROM encuesta WHERE pregunta=1 AND respuesta=4) AS "p1_r4",
                        (SELECT COUNT(*) FROM encuesta WHERE pregunta=1 AND respuesta=5) AS "p1_r5",
                        (SELECT COUNT(*) FROM encuesta WHERE pregunta=2 AND respuesta=1) AS "p2_r1",
                        (SELECT COUNT(*) FROM encuesta WHERE pregunta=2 AND respuesta=2) AS "p2_r2",
                        (SELECT COUNT(*) FROM encuesta WHERE pregunta=2 AND respuesta=3) AS "p2_r3",
                        (SELECT COUNT(*) FROM encuesta WHERE pregunta=2 AND respuesta=4) AS "p2_r4",
                        (SELECT COUNT(*) FROM encuesta WHERE pregunta=2 AND respuesta=5) AS "p2_r5",
                        (SELECT COUNT(*) FROM encuesta WHERE pregunta=3 AND respuesta=1) AS "p3_r1",
                        (SELECT COUNT(*) FROM encuesta WHERE pregunta=3 AND respuesta=2) AS "p3_r2",
                        (SELECT COUNT(*) FROM encuesta WHERE pregunta=3 AND respuesta=3) AS "p3_r3",
                        (SELECT COUNT(*) FROM encuesta WHERE pregunta=3 AND respuesta=4) AS "p3_r4",
                        (SELECT COUNT(*) FROM encuesta WHERE pregunta=3 AND respuesta=5) AS "p3_r5",                
                        (SELECT COUNT(*) FROM encuesta WHERE pregunta=4 AND respuesta=1) AS "p4_r1",
                        (SELECT COUNT(*) FROM encuesta WHERE pregunta=4 AND respuesta=2) AS "p4_r2",
                        (SELECT COUNT(*) FROM encuesta WHERE pregunta=4 AND respuesta=3) AS "p4_r3",
                        (SELECT COUNT(*) FROM encuesta WHERE pregunta=4 AND respuesta=4) AS "p4_r4",
                        (SELECT COUNT(*) FROM encuesta WHERE pregunta=4 AND respuesta=5) AS "p4_r5",
                        (SELECT COUNT(*) FROM encuesta WHERE pregunta=5 AND respuesta=1) AS "p5_r1",
                        (SELECT COUNT(*) FROM encuesta WHERE pregunta=5 AND respuesta=2) AS "p5_r2",
                        (SELECT COUNT(*) FROM encuesta WHERE pregunta=5 AND respuesta=3) AS "p5_r3",
                        (SELECT COUNT(*) FROM encuesta WHERE pregunta=5 AND respuesta=4) AS "p5_r4",
                        (SELECT COUNT(*) FROM encuesta WHERE pregunta=5 AND respuesta=5) AS "p5_r5"
                ')
            );
        }

        $res = (array) $res1[0];
        $data = [];
        

        for($i=1; $i<=5 ; $i++) { 
            $nuevo = [
                'pregunta'=>$preguntas[$i-1]->pregunta, 
                $respuestas[0]->respuesta => $res['p'.$i.'_r1'], 
                $respuestas[1]->respuesta => $res['p'.$i.'_r2'], 
                $respuestas[2]->respuesta => $res['p'.$i.'_r3'],
                $respuestas[3]->respuesta => $res['p'.$i.'_r4'], 
                $respuestas[4]->respuesta => $res['p'.$i.'_r5'], 
            ];
            array_push($data, $nuevo);
        }

        return json_encode(['data'=>$data]);
    }
}
