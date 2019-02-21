<?php

namespace usuarios\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;

class CajaController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
        
    }

    public function index(Guard $auth)
    {
        //Verificar perfil
        $aut=DB::table('users')->join('cargo','cargo.id_users','=','users.id')->where('users.id',Auth::guard()->user()->id)->get();
        if (strpos($aut, 'Cocina')) {
            return redirect('cocina');
        }else if(strpos($aut, 'Master')){
            return redirect('master');
        }
        $mesas = DB::table('mesa')->select("mesa.numero_mesa",'mesa.id')->join("estado_mesa","estado_mesa.id_mesa","=","mesa.id")->where("estado_mesa.estado","Abierto")->orwhere("estado_mesa.estado","Atendido")->get();
        $i=0;
        $lista=array();
        $mesasid=array();
        foreach ($mesas as $mesa) {
            $lista[$i]=$mesa->numero_mesa;
            $mesasid[$i]=$mesa->id;
            $i++;
        }
        $plato = DB::table('plato')->select('plato.nombre','precio')->get();
        $lista_platos = array('0' => 'Seleccione Plato');
        $i=1;
        foreach ($plato as $platos) {
            $lista_platos[$i]=$platos->nombre." $".$platos->precio;
            $i++;
        }
        $bebida = DB::table('bebida')->get();
        $cafe = DB::table('cafe')->get();
        $pastel = DB::table('pasteles')->get();

        $comida = DB::table('plato_mesa')->join('plato','plato.id','=','plato_mesa.id_plato')->join('mesa','mesa.id','=','plato_mesa.id_mesa')->join("estado_mesa","estado_mesa.id_mesa","=","mesa.id")->where('estado_mesa.estado','Abierto')->get();
        $bebiditas = DB::table('mesa')->join('bebida_mesa','bebida_mesa.id_mesa','=','mesa.id')->join('bebida','bebida.id','=','bebida_mesa.id_bebida')->join("estado_mesa","estado_mesa.id_mesa","=","mesa.id")->where('estado_mesa.estado','Abierto')->get();
        $pastelitos = DB::table('mesa')->join('pasteles_mesa','pasteles_mesa.id_mesa','=','mesa.id')->join('pasteles','pasteles.id','=','pasteles_mesa.id_pastel')->join("estado_mesa","estado_mesa.id_mesa","=","mesa.id")->where('estado_mesa.estado','Abierto')->get();
        $cafeteria = DB::table('mesa')->join('cafe_mesa','cafe_mesa.id_mesa','=','mesa.id')->join('cafe','cafe.id','=','cafe_mesa.id_cafe')->join("estado_mesa","estado_mesa.id_mesa","=","mesa.id")->where('estado_mesa.estado','Abierto')->get();
        return view('homeCaja',compact('lista', 'lista_platos','mesasid','cafe','pastel','bebida','bebiditas','comida','bebiditas','pastelitos','cafeteria'));
    }


    public function getMesa($num){
        //verificar perfil
        $aut=DB::table('users')->join('cargo','cargo.id_users','=','users.id')->where('users.id',Auth::guard()->user()->id)->get();
        if (strpos($aut, 'Cocina')) {
            return redirect('cocina');
        }else if(strpos($aut, 'Master')){
            return redirect('master');
        }
        DB::table('mesa')->join('estado_mesa','mesa.id','=','estado_mesa.id_mesa')->where([['mesa.numero_mesa',$num],['estado_mesa.estado','Abierto']])->update(['estado_mesa.estado'=>'Cerrado']);
        
        return back()->withInput();
    }

    public function imprimir($num){
        $aut=DB::table('users')->join('cargo','cargo.id_users','=','users.id')->where('users.id',Auth::guard()->user()->id)->get();
        if (strpos($aut, 'Cocina')) {
            return redirect('cocina');
        }else if(strpos($aut, 'Master')){
            return redirect('master');
        }


        $comida = DB::table('plato_mesa')->join('plato','plato.id','=','plato_mesa.id_plato')->join('mesa','mesa.id','=','plato_mesa.id_mesa')->join("estado_mesa","estado_mesa.id_mesa","=","mesa.id")->where([['estado_mesa.estado','Abierto'],['mesa.numero_mesa',$num]])->get();
        $bebiditas = DB::table('mesa')->join('bebida_mesa','bebida_mesa.id_mesa','=','mesa.id')->join('bebida','bebida.id','=','bebida_mesa.id_bebida')->join("estado_mesa","estado_mesa.id_mesa","=","mesa.id")->where([['estado_mesa.estado','Abierto'],['mesa.numero_mesa',$num]])->get();
        $pastelitos = DB::table('mesa')->join('pasteles_mesa','pasteles_mesa.id_mesa','=','mesa.id')->join('pasteles','pasteles.id','=','pasteles_mesa.id_pastel')->join("estado_mesa","estado_mesa.id_mesa","=","mesa.id")->where([['estado_mesa.estado','Abierto'],['mesa.numero_mesa',$num]])->get();
        $cafeteria = DB::table('mesa')->join('cafe_mesa','cafe_mesa.id_mesa','=','mesa.id')->join('cafe','cafe.id','=','cafe_mesa.id_cafe')->join("estado_mesa","estado_mesa.id_mesa","=","mesa.id")->where([['estado_mesa.estado','Abierto'],['mesa.numero_mesa',$num]])->get();
        return view('imprimirComandaCaja',compact('cafeteria','pastelitos','bebiditas','comida','num'));
    }

    public function destroy($id){
        //verificar perfil
        $aut=DB::table('users')->join('cargo','cargo.id_users','=','users.id')->where('users.id',Auth::guard()->user()->id)->get();
        if (strpos($aut, 'Cocina')) {
            return redirect('cocina');
        }else if(strpos($aut, 'Master')){
            return redirect('master');
        }
        DB::table('mesa')->join('estado_mesa','estado_mesa.id_mesa','=','mesa.id')->where([['mesa.numero_mesa',$id],['estado_mesa.estado','Abierto']])->delete();
        return back()->withInput();
    }

    public function editA(Request $datos){
        //verificar perfil
        $aut=DB::table('users')->join('cargo','cargo.id_users','=','users.id')->where('users.id',Auth::guard()->user()->id)->get();
        if (strpos($aut, 'Cocina')) {
            return redirect('cocina');
        }else if(strpos($aut, 'Master')){
            return redirect('master');
        }

        $id = DB::table('mesa')->select('mesa.id')->join('estado_mesa','estado_mesa.id_mesa','=','mesa.id')->where([['mesa.numero_mesa','=', $datos->input('num')],['estado_mesa.estado','Abierto']])->get();
        foreach ($id as $ids) {
            $clave=$ids->id;
        }

        if ($datos->input('sandwichE') != 0) {
            DB::table('plato_mesa')->insert(['id_mesa' => $clave, 'id_plato' => $datos->input('sandwichE'), 'cantidad' => $datos->input('cantSE')]);
        }

        if ($datos->input('bebidaE') != 0) {
            DB::table('bebida_mesa')->insert(['id_mesa' => $clave, 'id_bebida' => $datos->input('bebidaE'), 'cantidad' => $datos->input('cantBE')]);
        }

        if ($datos->input('cafeE') != 0) {
            DB::table('cafe_mesa')->insert(['id_mesa' => $clave, 'id_cafe' => $datos->input('cafeE'), 'cantidad' => $datos->input('cantCE')]);
        }

        if ($datos->input('pastelE') != 0) {
            DB::table('pasteles_mesa')->insert(['id_mesa' => $clave, 'id_pastel' => $datos->input('pastelE'), 'cantidad' => $datos->input('cantPE')]);
        }

        $i=1;
        while (!is_null($datos->input('sandwichE'.$i)) ) {
            if ($datos->input('sandwichE'.$i) != 0) {
                DB::table('plato_mesa')->insert(['id_mesa' => $clave, 'id_plato' => $datos->input('sandwichE'.$i), 'cantidad' => $datos->input('cantSE'.$i)]);
                $i++;
            }
        }

        $i=1;
        while (!is_null($datos->input('bebidaE'.$i)) ) {
            if ($datos->input('bebidaE'.$i) != 0) {
                DB::table('bebida_mesa')->insert(['id_mesa' => $clave, 'id_bebida' => $datos->input('bebidaE'.$i), 'cantidad' => $datos->input('cantBE'.$i)]);
                $i++;
            }  
        }

        $i=1;
        while (!is_null($datos->input('cafeE'.$i)) ) {
            if ($datos->input('cafeE'.$i) != 0) {
                DB::table('cafe_mesa')->insert(['id_mesa' => $clave, 'id_cafe' => $datos->input('cafeE'.$i), 'cantidad' => $datos->input('cantCE'.$i)]);
                $i++;
            }
        }

        $i=1;
        while (!is_null($datos->input('pastelE'.$i)) ) {
            if ($datos->input('pastelE'.$i) != 0) {
                DB::table('pasteles_mesa')->insert(['id_mesa' => $clave, 'id_pastel' => $datos->input('pastelE'.$i), 'cantidad' => $datos->input('cantPE'.$i)]);
                $i++;
            }   
        }
        return back()->withInput();
    }


    public function getform(Request $datos){
        //verificar perfil
        $aut=DB::table('users')->join('cargo','cargo.id_users','=','users.id')->where('users.id',Auth::guard()->user()->id)->get();
        if (strpos($aut, 'Cocina')) {
            return redirect('cocina');
        }else if(strpos($aut, 'Master')){
            return redirect('master');
        }
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
                DB::table('plato_mesa')->insert(['id_mesa' => $clave, 'id_plato' => $datos->input('sandwich'.$i), 'cantidad' => $datos->input('cantS'.$i)]);
                $i++;
            }
        }

        $i=1;
        while (!is_null($datos->input('bebida'.$i)) ) {
            if ($datos->input('bebida'.$i) != 0) {
                DB::table('bebida_mesa')->insert(['id_mesa' => $clave, 'id_bebida' => $datos->input('bebida'.$i), 'cantidad' => $datos->input('cantB'.$i)]);
                $i++;
            }  
        }

        $i=1;
        while (!is_null($datos->input('cafe'.$i)) ) {
            if ($datos->input('cafe'.$i) != 0) {
                DB::table('cafe_mesa')->insert(['id_mesa' => $clave, 'id_cafe' => $datos->input('cafe'.$i), 'cantidad' => $datos->input('cantC'.$i)]);
                $i++;
            }
        }

        $i=1;
        while (!is_null($datos->input('pastel'.$i)) ) {
            if ($datos->input('pastel'.$i) != 0) {
                DB::table('pasteles_mesa')->insert(['id_mesa' => $clave, 'id_pastel' => $datos->input('pastel'.$i), 'cantidad' => $datos->input('cantP'.$i)]);
                $i++;
            }   
        }
        return back()->withInput();
    }

    
}
