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
        if(strpos($test, 'Caja') !== false){
            $mesas = DB::table('mesa')->select("mesa.numero_mesa",'mesa.id')->join("estado_mesa","estado_mesa.id_mesa","=","mesa.id")->where("estado_mesa.estado","Abierto")->orwhere("estado_mesa.estado","Atendido")->get();
            $i=0;
            $lista=array();
            $mesasid=array();
            foreach ($mesas as $mesa) {
                $lista[$i]=$mesa->numero_mesa;
                $mesasid[$i]=$mesa->id;
                $i++;
            }

            $plato = DB::table('plato')->select('plato.nombre','precio')->get('');
            $lista_platos = array('0' => 'Seleccione Plato');
            $i=1;
            foreach ($plato as $platos) {
                $lista_platos[$i]=$platos->nombre." $".$platos->precio;
                $i++;
            }
            
            $comida_mesas = array();
            $precio_mesas = array();
            $num_mesa=array();
            $comida = array();
            $comida_array= array();
            $precio_array= array();
            $num_array= array();
            $i=0;
            $j=0;
            foreach ($mesasid as $id) {
                $comida = DB::table('plato_mesa')->select('plato.nombre','plato.precio','mesa.numero_mesa')->join('plato','plato.id','=','plato_mesa.id_plato')->join('mesa','mesa.id','=','plato_mesa.id_mesa')->where('plato_mesa.id_mesa',$id)->get();
                foreach ($comida as $com) {
                    $comida_array[$i]=$com->nombre;
                    $precio_array[$i]=$com->precio;
                    $num_array[$i]=$com->numero_mesa;
                    $i++;
                }
                $i=0;
                $comida_mesas[$j]=$comida_array;
                $precio_mesas[$j]=$precio_array;
                $num_mesa[$j]=$num_array;
                $comida_array= array();
                $precio_array= array();
                $num_array= array();
                $j++;
                
            }
            $bebida = DB::table('bebida')->get();
            $cafe = DB::table('cafe')->get();
            $pastel = DB::table('pasteles')->get();
            
            return view('homeCaja',compact('lista', 'lista_platos','mesasid','comida_mesas','precio_mesas','num_mesa','cafe','pastel','bebida'));
        }else if(strpos($test, 'Cocina') !== false){
            return view('homeCocina');
        }else if(strpos($test, 'Master') !== false){
            return view('homeMaster');
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

        //insert tabla intermedia (mesa - comida)
        if ($datos->input('sandwich') != 0) {
            DB::table('plato_mesa')->insert(['id_mesa' => $clave, 'id_plato' => $datos->input('sandwich'), 'cantidad' => $datos->input('cantS')]);
        }

        if ($datos->input('bebida') != 0) {
            DB::table('bebida_mesa')->insert(['id_mesa' => $clave, 'id_bebida' => $datos->input('bebida'), 'cantidad' => $datos->input('cantB')]);
        }

        if ($datos->input('cafe') != 0) {
            DB::table('cafe_mesa')->insert(['id_mesa' => $clave, 'id_cafe' => $datos->input('cafe'), 'cantidad' => $datos->input('cantC')]);
        }

        if ($datos->input('pastel') != 0) {
            DB::table('pasteles_mesa')->insert(['id_mesa' => $clave, 'id_pastel' => $datos->input('pastel'), 'cantidad' => $datos->input('cantP')]);
        }

        $i=1;
        while (!is_null($datos->input('sandwich'.$i)) ) {
            if ($datos->input('sandwich'.$i) != 0) {
                DB::table('plato_mesa')->insert(['id_mesa' => $clave, 'id_plato' => $datos->input('sandwich'.$i), 'cantidad' => $datos->input('cantS')]);
                $i++;
            }
        }

        $i=1;
        while (!is_null($datos->input('bebida'.$i)) ) {
            if ($datos->input('bebida'.$i) != 0) {
                DB::table('bebida_mesa')->insert(['id_mesa' => $clave, 'id_bebida' => $datos->input('bebida'.$i), 'cantidad' => $datos->input('cantB')]);
                $i++;
            }  
        }

        $i=1;
        while (!is_null($datos->input('cafe'.$i)) ) {
            if ($datos->input('cafe'.$i) != 0) {
                DB::table('cafe_mesa')->insert(['id_mesa' => $clave, 'id_cafe' => $datos->input('cafe'.$i), 'cantidad' => $datos->input('cantC')]);
                $i++;
            }
        }

        $i=1;
        while (!is_null($datos->input('pastel'.$i)) ) {
            if ($datos->input('pastel'.$i) != 0) {
                DB::table('pasteles_mesa')->insert(['id_mesa' => $clave, 'id_pastel' => $datos->input('pastel'.$i), 'cantidad' => $datos->input('cantP')]);
                $i++;
            }   
        }

        return back()->withInput();
        
    }
}
