<?php

namespace usuarios\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Auth\Guard;

class HomeController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Guard $auth)
    {
        $test = DB::table('users')->select('cargo.nombre_cargo')->join('cargo','cargo.id_users','=','users.id')->where('users.id',$auth->user()->id)->get();
        if(strpos($test, 'Garzon') !== false){
            $mesas = DB::table('mesa')->select("mesa.numero_mesa")->join("estado_mesa","estado_mesa.id_mesa","=","mesa.id")->where("estado_mesa.estado","Abierto")->orwhere("estado_mesa.estado","Atendido")->get();
            $i=0;
            $lista=array();
            foreach ($mesas as $mesa) {
                $lista[$i]="bmesa".$mesa->numero_mesa;
                $i++;
            }
            
            return view('homeGarzon')->with('lista',$lista);
           
        }else if(strpos($test, 'Cocina') !== false){
            return view('homeCocina');
        }else if(strpos($test, 'Master') !== false){
            return view('homeMaster');
        }else if(strpos($test, 'Caja') !== false){
            return view('homeCaja');
        }
        
    }

    public function getform(Request $datos){
        //insert mesa
        $fecha = date("Y-m-d")." ".date("h:i:s");
        DB::table('mesa')->insert(
            ['numero_mesa' => $datos->input('num') , 'fecha' => $fecha]
        );
        //insert estado_mesa
        $id = DB::table('mesa')->select('id')->where([['fecha','=',$fecha],['numero_mesa','=', $datos->input('num')]])->get();
        foreach ($id as $ids) {
            $clave=$ids->id;
        }
        DB::table('estado_mesa')->insert(['estado' => 1, 'id_mesa' => $clave]);
        return back()->withInput();
    }
}
