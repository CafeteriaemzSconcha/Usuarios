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
        $helado = DB::table('helados')->get();
        $postre = DB::table('postres')->get();
        $desayuno = DB::table('desayuno')->get();
        $agregado = DB::table('agregados')->get();

        $comida = DB::table('plato_mesa')->join('plato','plato.id','=','plato_mesa.id_plato')->join('mesa','mesa.id','=','plato_mesa.id_mesa')->join("estado_mesa","estado_mesa.id_mesa","=","mesa.id")->where('estado_mesa.estado','Abierto')->get();
        $bebiditas = DB::table('mesa')->join('bebida_mesa','bebida_mesa.id_mesa','=','mesa.id')->join('bebida','bebida.id','=','bebida_mesa.id_bebida')->join("estado_mesa","estado_mesa.id_mesa","=","mesa.id")->where('estado_mesa.estado','Abierto')->get();
        $pastelitos = DB::table('mesa')->join('pasteles_mesa','pasteles_mesa.id_mesa','=','mesa.id')->join('pasteles','pasteles.id','=','pasteles_mesa.id_pastel')->join("estado_mesa","estado_mesa.id_mesa","=","mesa.id")->where('estado_mesa.estado','Abierto')->get();
        $cafeteria = DB::table('mesa')->join('cafe_mesa','cafe_mesa.id_mesa','=','mesa.id')->join('cafe','cafe.id','=','cafe_mesa.id_cafe')->join("estado_mesa","estado_mesa.id_mesa","=","mesa.id")->where('estado_mesa.estado','Abierto')->get();
        $desayunitos = DB::table('mesa')->join('desayuno_mesa','desayuno_mesa.id_mesa','=','mesa.id')->join('desayuno','desayuno.id','=','desayuno_mesa.id_desayuno')->join("estado_mesa","estado_mesa.id_mesa","=","mesa.id")->where('estado_mesa.estado','Abierto')->get();
        $heladitos = DB::table('mesa')->join('helado_mesa','helado_mesa.id_mesa','=','mesa.id')->join('helados','helados.id','=','helado_mesa.id_helado')->join("estado_mesa","estado_mesa.id_mesa","=","mesa.id")->where('estado_mesa.estado','Abierto')->get();
        $postresitos = DB::table('mesa')->join('postre_mesa','postre_mesa.id_mesa','=','mesa.id')->join('postres','postres.id','=','postre_mesa.id_postre')->join("estado_mesa","estado_mesa.id_mesa","=","mesa.id")->where('estado_mesa.estado','Abierto')->get();
        $agregaditos = DB::table('mesa')->join('agregado_mesa','agregado_mesa.id_mesa','=','mesa.id')->join('agregados','agregados.id','=','agregado_mesa.id_agregado')->join("estado_mesa","estado_mesa.id_mesa","=","mesa.id")->where('estado_mesa.estado','Abierto')->get();
        return view('homeCaja',compact('lista', 'lista_platos','mesasid','cafe','pastel','bebida','helado','postre','desayuno','agregado','bebiditas','comida','bebiditas','pastelitos','cafeteria','desayunitos','heladitos','postresitos','agregaditos'));
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

    public function imprimir($num,$desc){
        $aut=DB::table('users')->join('cargo','cargo.id_users','=','users.id')->where('users.id',Auth::guard()->user()->id)->get();
        if (strpos($aut, 'Cocina')) {
            return redirect('cocina');
        }else if(strpos($aut, 'Master')){
            return redirect('master');
        }
        $id = DB::table('mesa')->select('mesa.id')->join('estado_mesa','estado_mesa.id_mesa','=','mesa.id')->where([['mesa.numero_mesa','=', $num],['estado_mesa.estado','Abierto']])->get();
        foreach ($id as $ids) {
            $clave=$ids->id;
        }
        if ($desc !=0) {
            DB::table('descuentos')->insert(['descuento'=>$desc,'id_mesa'=>$clave]);
        }

        $comida = DB::table('plato_mesa')->join('plato','plato.id','=','plato_mesa.id_plato')->join('mesa','mesa.id','=','plato_mesa.id_mesa')->join("estado_mesa","estado_mesa.id_mesa","=","mesa.id")->where([['estado_mesa.estado','Abierto'],['mesa.numero_mesa',$num]])->get();
        $bebiditas = DB::table('mesa')->join('bebida_mesa','bebida_mesa.id_mesa','=','mesa.id')->join('bebida','bebida.id','=','bebida_mesa.id_bebida')->join("estado_mesa","estado_mesa.id_mesa","=","mesa.id")->where([['estado_mesa.estado','Abierto'],['mesa.numero_mesa',$num]])->get();
        $pastelitos = DB::table('mesa')->join('pasteles_mesa','pasteles_mesa.id_mesa','=','mesa.id')->join('pasteles','pasteles.id','=','pasteles_mesa.id_pastel')->join("estado_mesa","estado_mesa.id_mesa","=","mesa.id")->where([['estado_mesa.estado','Abierto'],['mesa.numero_mesa',$num]])->get();
        $cafeteria = DB::table('mesa')->join('cafe_mesa','cafe_mesa.id_mesa','=','mesa.id')->join('cafe','cafe.id','=','cafe_mesa.id_cafe')->join("estado_mesa","estado_mesa.id_mesa","=","mesa.id")->where([['estado_mesa.estado','Abierto'],['mesa.numero_mesa',$num]])->get();
        $desayunitos = DB::table('mesa')->join('desayuno_mesa','desayuno_mesa.id_mesa','=','mesa.id')->join('desayuno','desayuno.id','=','desayuno_mesa.id_desayuno')->join("estado_mesa","estado_mesa.id_mesa","=","mesa.id")->where([['estado_mesa.estado','Abierto'],['mesa.numero_mesa',$num]])->get();
        $heladitos = DB::table('mesa')->join('helado_mesa','helado_mesa.id_mesa','=','mesa.id')->join('helados','helados.id','=','helado_mesa.id_helado')->join("estado_mesa","estado_mesa.id_mesa","=","mesa.id")->where([['estado_mesa.estado','Abierto'],['mesa.numero_mesa',$num]])->get();
        $postresitos = DB::table('mesa')->join('postre_mesa','postre_mesa.id_mesa','=','mesa.id')->join('postres','postres.id','=','postre_mesa.id_postre')->join("estado_mesa","estado_mesa.id_mesa","=","mesa.id")->where([['estado_mesa.estado','Abierto'],['mesa.numero_mesa',$num]])->get();
        $agregaditos = DB::table('mesa')->join('agregado_mesa','agregado_mesa.id_mesa','=','mesa.id')->join('agregados','agregados.id','=','agregado_mesa.id_agregado')->join("estado_mesa","estado_mesa.id_mesa","=","mesa.id")->where([['estado_mesa.estado','Abierto'],['mesa.numero_mesa',$num]])->get();
        return view('imprimirComandaCaja',compact('cafeteria','pastelitos','bebiditas','comida','desayunitos','heladitos','postresitos','agregaditos','desc','num'));
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

        $id = DB::table('mesa')->join('estado_mesa','estado_mesa.id_mesa','=','mesa.id')->where([['mesa.numero_mesa','=', $datos->input('num')],['estado_mesa.estado','Abierto']])->get();
        foreach ($id as $ids) {
            $clave=$ids->id;
            $num=$ids->numero_mesa;
        }

        if ($datos->input('obs')!=null) {
            $obs=DB::table('mesa')->select('mesa.observacion')->where('mesa.id','=', $clave)->get();
            foreach ($obs as $obss) {
                $ob=$obss->observacion.", ".$datos->input('obs');
            }
            
            DB::table('mesa')->where('mesa.id',$clave)->update(['mesa.observacion'=>$ob]);
            
        }

        if ($datos->input('sandwichE') != 0) {
            DB::table('plato_mesa')->insert(['id_mesa' => $clave, 'id_plato' => $datos->input('sandwichE'), 'cantidad' => $datos->input('cantSE'), 'descuento' => $datos->input('descSE')]);
        }

        if ($datos->input('bebidaE') != 0) {
            DB::table('bebida_mesa')->insert(['id_mesa' => $clave, 'id_bebida' => $datos->input('bebidaE'), 'cantidad' => $datos->input('cantBE'), 'descuento' => $datos->input('descBE')]);
        }

        if ($datos->input('cafeE') != 0) {
            DB::table('cafe_mesa')->insert(['id_mesa' => $clave, 'id_cafe' => $datos->input('cafeE'), 'cantidad' => $datos->input('cantCE'), 'descuento' => $datos->input('descCE')]);
        }

        if ($datos->input('pastelE') != 0) {
            DB::table('pasteles_mesa')->insert(['id_mesa' => $clave, 'id_pastel' => $datos->input('pastelE'), 'cantidad' => $datos->input('cantPE'), 'descuento' => $datos->input('descPE')]);
        }

        if ($datos->input('postreE') != 0) {
            DB::table('postre_mesa')->insert(['id_mesa' => $clave, 'id_postre' => $datos->input('postreE'), 'cantidad' => $datos->input('cantPOE'), 'descuento' => $datos->input('descPOE')]);
        }

        if ($datos->input('heladoE') != 0) {
            DB::table('helado_mesa')->insert(['id_mesa' => $clave, 'id_helado' => $datos->input('heladoE'), 'cantidad' => $datos->input('cantHE'), 'descuento' => $datos->input('descHE')]);
        }

        if ($datos->input('desayunoE') != 0) {
            DB::table('desayuno_mesa')->insert(['id_mesa' => $clave, 'id_desayuno' => $datos->input('desayunoE'), 'cantidad' => $datos->input('cantDE'), 'descuento' => $datos->input('descDE')]);
        }

        if ($datos->input('agregadoE') != 0) {
            DB::table('agregado_mesa')->insert(['id_mesa' => $clave, 'id_agregado' => $datos->input('agregadoE')]);
        }

        $i=1;
        while (!is_null($datos->input('sandwichE'.$num.$i)) ) {
            if ($datos->input('sandwichE'.$num.$i) != 0) {
                DB::table('plato_mesa')->insert(['id_mesa' => $clave, 'id_plato' => $datos->input('sandwichE'.$num.$i), 'cantidad' => $datos->input('cantSE'.$num.$i), 'descuento' => $datos->input('descSE'.$num.$i)]);
                $i++;
            }
        }

        $i=1;
        while (!is_null($datos->input('bebidaE'.$num.$i)) ) {
            if ($datos->input('bebidaE'.$num.$i) != 0) {
                DB::table('bebida_mesa')->insert(['id_mesa' => $clave, 'id_bebida' => $datos->input('bebidaE'.$num.$i), 'cantidad' => $datos->input('cantBE'.$num.$i), 'descuento' => $datos->input('descBE'.$num.$i)]);
                $i++;
            }  
        }

        $i=1;
        while (!is_null($datos->input('cafeE'.$num.$i)) ) {
            if ($datos->input('cafeE'.$num.$i) != 0) {
                DB::table('cafe_mesa')->insert(['id_mesa' => $clave, 'id_cafe' => $datos->input('cafeE'.$num.$i), 'cantidad' => $datos->input('cantCE'.$num.$i), 'descuento' => $datos->input('descCE'.$num.$i)]);
                $i++;
            }
        }

        $i=1;
        while (!is_null($datos->input('pastelE'.$num.$i)) ) {
            if ($datos->input('pastelE'.$num.$i) != 0) {
                DB::table('pasteles_mesa')->insert(['id_mesa' => $clave, 'id_pastel' => $datos->input('pastelE'.$num.$i), 'cantidad' => $datos->input('cantPE'.$num.$i), 'descuento' => $datos->input('descPE'.$num.$i)]);
                $i++;
            }   
        }

        $i=1;
        while (!is_null($datos->input('postreE'.$num.$i)) ) {
            if ($datos->input('postreE'.$num.$i) != 0) {
                DB::table('postre_mesa')->insert(['id_mesa' => $clave, 'id_postre' => $datos->input('postreE'.$num.$i), 'cantidad' => $datos->input('cantPOE'.$num.$i), 'descuento' => $datos->input('descPOE'.$num.$i)]);
                $i++;
            }   
        }

        $i=1;
        while (!is_null($datos->input('heladoE'.$num.$i)) ) {
            if ($datos->input('heladoE'.$num.$i) != 0) {
                DB::table('helado_mesa')->insert(['id_mesa' => $clave, 'id_helado' => $datos->input('heladoE'.$num.$i), 'cantidad' => $datos->input('cantHE'.$num.$i), 'descuento' => $datos->input('descHE'.$num.$i)]);
                $i++;
            }   
        }

        $i=1;
        while (!is_null($datos->input('desayunoE'.$num.$i)) ) {
            if ($datos->input('desayunoE'.$num.$i) != 0) {
                DB::table('helado_mesa')->insert(['id_mesa' => $clave, 'id_desayuno' => $datos->input('desayunoE'.$num.$i), 'cantidad' => $datos->input('cantDE'.$num.$i), 'descuento' => $datos->input('descDE'.$num.$i)]);
                $i++;
            }   
        }

        $i=1;
        while (!is_null($datos->input('agregadoE'.$num.$i)) ) {
            if ($datos->input('agregadoE'.$num.$i) != 0) {
                DB::table('agregado_mesa')->insert(['id_mesa' => $clave, 'id_agregado' => $datos->input('agregadoE'.$num.$i), 'descuento' => $datos->input('descAE'.$num.$i)]);
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
            ['numero_mesa' => $datos->input('num') , 'fecha' => $fecha, 'observacion' => $datos->input('obs')]
        );
        //insert estado_mesa
        $id = DB::table('mesa')->select('id')->where([['fecha','=',$fecha],['numero_mesa','=', $datos->input('num')]])->get();
        foreach ($id as $ids) {
            $clave=$ids->id;
        }
        DB::table('estado_mesa')->insert(['estado' => 1, 'id_mesa' => $clave]);

        //insert tabla intermedia (mesa - comida)
        if ($datos->input('sandwich') != 0) {
            DB::table('plato_mesa')->insert(['id_mesa' => $clave, 'id_plato' => $datos->input('sandwich'), 'cantidad' => $datos->input('cantS'), 'descuento' => $datos->input('descS')]);
        }

        if ($datos->input('bebida') != 0) {
            DB::table('bebida_mesa')->insert(['id_mesa' => $clave, 'id_bebida' => $datos->input('bebida'), 'cantidad' => $datos->input('cantB'), 'descuento' => $datos->input('descB')]);
        }

        if ($datos->input('cafe') != 0) {
            DB::table('cafe_mesa')->insert(['id_mesa' => $clave, 'id_cafe' => $datos->input('cafe'), 'cantidad' => $datos->input('cantC'), 'descuento' => $datos->input('descC')]);
        }

        if ($datos->input('pastel') != 0) {
            DB::table('pasteles_mesa')->insert(['id_mesa' => $clave, 'id_pastel' => $datos->input('pastel'), 'cantidad' => $datos->input('cantP'), 'descuento' => $datos->input('descP')]);
        }

        if ($datos->input('helado') != 0) {
            DB::table('helado_mesa')->insert(['id_mesa' => $clave, 'id_helado' => $datos->input('helado'), 'cantidad' => $datos->input('cantH'), 'descuento' => $datos->input('descH')]);
        }

        if ($datos->input('postre') != 0) {
            DB::table('postre_mesa')->insert(['id_mesa' => $clave, 'id_postre' => $datos->input('postre'), 'cantidad' => $datos->input('cantPO'), 'descuento' => $datos->input('descPO')]);
        }

        if ($datos->input('desayuno') != 0) {
            DB::table('desayuno_mesa')->insert(['id_mesa' => $clave, 'id_desayuno' => $datos->input('desayuno'), 'cantidad' => $datos->input('cantD'), 'descuento' => $datos->input('descD')]);
        }

        if ($datos->input('agregado') != 0) {
            DB::table('agregado_mesa')->insert(['id_mesa' => $clave, 'id_agregado' => $datos->input('agregado'), 'descuento' => $datos->input('descA')]);
        }
        $i=1;
        while (!is_null($datos->input('sandwich'.$i)) ) {
            if ($datos->input('sandwich'.$i) != 0) {
                DB::table('plato_mesa')->insert(['id_mesa' => $clave, 'id_plato' => $datos->input('sandwich'.$i), 'cantidad' => $datos->input('cantS'.$i), 'descuento' => $datos->input('descS'.$i)]);
                $i++;
            }
        }

        $i=1;
        while (!is_null($datos->input('bebida'.$i)) ) {
            if ($datos->input('bebida'.$i) != 0) {
                DB::table('bebida_mesa')->insert(['id_mesa' => $clave, 'id_bebida' => $datos->input('bebida'.$i), 'cantidad' => $datos->input('cantB'.$i), 'descuento' => $datos->input('descB'.$i)]);
                $i++;
            }  
        }

        $i=1;
        while (!is_null($datos->input('cafe'.$i)) ) {
            if ($datos->input('cafe'.$i) != 0) {
                DB::table('cafe_mesa')->insert(['id_mesa' => $clave, 'id_cafe' => $datos->input('cafe'.$i), 'cantidad' => $datos->input('cantC'.$i), 'descuento' => $datos->input('descC'.$i)]);
                $i++;
            }
        }

        $i=1;
        while (!is_null($datos->input('pastel'.$i)) ) {
            if ($datos->input('pastel'.$i) != 0) {
                DB::table('pasteles_mesa')->insert(['id_mesa' => $clave, 'id_pastel' => $datos->input('pastel'.$i), 'cantidad' => $datos->input('cantP'.$i), 'descuento' => $datos->input('descP'.$i)]);
                $i++;
            }   
        }

        $i=1;
        while (!is_null($datos->input('postre'.$i)) ) {
            if ($datos->input('postre'.$i) != 0) {
                DB::table('postre_mesa')->insert(['id_mesa' => $clave, 'id_postre' => $datos->input('postre'.$i), 'cantidad' => $datos->input('cantPO'.$i), 'descuento' => $datos->input('descPO'.$i)]);
                $i++;
            }   
        }

        $i=1;
        while (!is_null($datos->input('helado'.$i)) ) {
            if ($datos->input('helado'.$i) != 0) {
                DB::table('helado_mesa')->insert(['id_mesa' => $clave, 'id_helado' => $datos->input('helado'.$i), 'cantidad' => $datos->input('cantH'.$i), 'descuento' => $datos->input('descH'.$i)]);
                $i++;
            }   
        }

        $i=1;
        while (!is_null($datos->input('desayuno'.$i)) ) {
            if ($datos->input('desayuno'.$i) != 0) {
                DB::table('desayuno_mesa')->insert(['id_mesa' => $clave, 'id_desayuno' => $datos->input('desayuno'.$i), 'cantidad' => $datos->input('cantD'.$i), 'descuento' => $datos->input('descD'.$i)]);
                $i++;
            }   
        }

        $i=1;
        while (!is_null($datos->input('agregado'.$i)) ) {
            if ($datos->input('agregado'.$i) != 0) {
                DB::table('agregado_mesa')->insert(['id_mesa' => $clave, 'id_agregado' => $datos->input('agregado'.$i), 'descuento' => $datos->input('descA'.$i)]);
                $i++;
            }   
        }
        return back()->withInput();
    }

    public function editMesa($array){
        //validar user
        var_dump($array);
        $ar = json_decode($array);
        var_dump($ar);
        foreach ($ar as $key) {
            if ($key[2] >= $key[3]) {
                $id = DB::table('mesa')->join('estado_mesa','estado_mesa.id_mesa','=','mesa.id')->where([['mesa.numero_mesa','=', $key[0]],['estado_mesa.estado','Abierto']])->get();
                foreach ($id as $ids) {
                    $clave=$ids->id;
                }
                if($key[4] == 'sandwich'){
                    $id_p = DB::table('plato')->where([['plato.nombre','=', $key[1]]])->get();
                    foreach ($id_p as $pro) {
                        $id_prod=$pro->id;
                    }
                    $id_e = DB::table('mesa')->join('estado_mesa','estado_mesa.id_mesa','=','mesa.id')->join('plato_mesa','mesa.id','=','plato_mesa.id_mesa')->where([['mesa.id','=', $clave],['estado_mesa.estado','Abierto'],['plato_mesa.id_plato',$id_prod]])->get();
                    foreach ($id_e as $eli) {
                        $id_el=$eli->id;
                    }
                    if ($key[2]==$key[3]) {
                        DB::table('plato_mesa')->where('id',$id_el)->delete();
                    }else{
                        DB::table('plato_mesa')->where('id',$id_el)->update(['cantidad' => ($key[2]-$key[3])]);
                    }
                }
                if($key[4] == 'bebida'){
                    $id_p = DB::table('bebida')->where([['bebida.nombre','=', $key[1]]])->get();
                    foreach ($id_p as $pro) {
                        $id_prod=$pro->id;
                    }
                    $id_e = DB::table('mesa')->join('estado_mesa','estado_mesa.id_mesa','=','mesa.id')->join('bebida_mesa','mesa.id','=','bebida_mesa.id_mesa')->where([['mesa.id','=', $clave],['estado_mesa.estado','Abierto'],['bebida_mesa.id_bebida',$id_prod]])->get();
                    foreach ($id_e as $eli) {
                        $id_el=$eli->id;
                    }
                    if ($key[2]==$key[3]) {
                        DB::table('bebida_mesa')->where('id',$id_el)->delete();
                    }else{
                        DB::table('bebida_mesa')->where('id',$id_el)->update(['cantidad' => ($key[2]-$key[3])]);
                    }
                }
                if($key[4] == 'pastel'){
                    $id_p = DB::table('pasteles')->where([['pasteles.nombre','=', $key[1]]])->get();
                    foreach ($id_p as $pro) {
                        $id_prod=$pro->id;
                    }
                    $id_e = DB::table('mesa')->join('estado_mesa','estado_mesa.id_mesa','=','mesa.id')->join('pasteles_mesa','mesa.id','=','pasteles_mesa.id_mesa')->where([['mesa.id','=', $clave],['estado_mesa.estado','Abierto'],['pasteles_mesa.id_pastel',$id_prod]])->get();
                    foreach ($id_e as $eli) {
                        $id_el=$eli->id;
                    }
                    if ($key[2]==$key[3]) {
                        DB::table('pasteles_mesa')->where('id',$id_el)->delete();
                    }else{
                        DB::table('pasteles_mesa')->where('id',$id_el)->update(['cantidad' => ($key[2]-$key[3])]);
                    }
                }
                if($key[4] == 'cafe'){
                    $id_p = DB::table('cafe')->where([['cafe.nombre','=', $key[1]]])->get();
                    foreach ($id_p as $pro) {
                        $id_prod=$pro->id;
                    }
                    $id_e = DB::table('mesa')->join('estado_mesa','estado_mesa.id_mesa','=','mesa.id')->join('cafe_mesa','mesa.id','=','cafe_mesa.id_mesa')->where([['mesa.id','=', $clave],['estado_mesa.estado','Abierto'],['cafe_mesa.id_cafe',$id_prod]])->get();
                    foreach ($id_e as $eli) {
                        $id_el=$eli->id;
                    }
                    if ($key[2]==$key[3]) {
                        DB::table('cafe_mesa')->where('id',$id_el)->delete();
                    }else{
                        DB::table('cafe_mesa')->where('id',$id_el)->update(['cantidad' => ($key[2]-$key[3])]);
                    }
                }
                if($key[4] == 'agregado'){
                    $id_p = DB::table('agregados')->where([['agregados.nombre','=', $key[1]]])->get();
                    foreach ($id_p as $pro) {
                        $id_prod=$pro->id;
                    }
                    $id_e = DB::table('mesa')->join('estado_mesa','estado_mesa.id_mesa','=','mesa.id')->join('agregado_mesa','mesa.id','=','agregado_mesa.id_mesa')->where([['mesa.id','=', $clave],['estado_mesa.estado','Abierto'],['agregado_mesa.id_agregado',$id_prod]])->get();
                    foreach ($id_e as $eli) {
                        $id_el=$eli->id;
                    }
                    if ($key[2]==$key[3]) {
                        DB::table('agregado_mesa')->where('id',$id_el)->delete();
                    }else{
                        DB::table('agregado_mesa')->where('id',$id_el)->update(['cantidad' => ($key[2]-$key[3])]);
                    }
                }
                if($key[4] == 'postre'){
                    $id_p = DB::table('postres')->where([['postres.nombre','=', $key[1]]])->get();
                    foreach ($id_p as $pro) {
                        $id_prod=$pro->id;
                    }
                    $id_e = DB::table('mesa')->join('estado_mesa','estado_mesa.id_mesa','=','mesa.id')->join('postre_mesa','mesa.id','=','postre_mesa.id_mesa')->where([['mesa.id','=', $clave],['estado_mesa.estado','Abierto'],['postre_mesa.id_postre',$id_prod]])->get();
                    foreach ($id_e as $eli) {
                        $id_el=$eli->id;
                    }
                    if ($key[2]==$key[3]) {
                        DB::table('postre_mesa')->where('id',$id_el)->delete();
                    }else{
                        DB::table('postre_mesa')->where('id',$id_el)->update(['cantidad' => ($key[2]-$key[3])]);
                    }
                }
                if($key[4] == 'helado'){
                    $id_p = DB::table('helados')->where([['helados.nombre','=', $key[1]]])->get();
                    foreach ($id_p as $pro) {
                        $id_prod=$pro->id;
                    }
                    $id_e = DB::table('mesa')->join('estado_mesa','estado_mesa.id_mesa','=','mesa.id')->join('helado_mesa','mesa.id','=','helado_mesa.id_mesa')->where([['mesa.id','=', $clave],['estado_mesa.estado','Abierto'],['helado_mesa.id_helado',$id_prod]])->get();
                    foreach ($id_e as $eli) {
                        $id_el=$eli->id;
                    }
                    if ($key[2]==$key[3]) {
                        DB::table('helado_mesa')->where('id',$id_el)->delete();
                    }else{
                        DB::table('helado_mesa')->where('id',$id_el)->update(['cantidad' => ($key[2]-$key[3])]);
                    }
                }
                if($key[4] == 'desayuno'){
                    $id_p = DB::table('desayuno')->where([['desayuno.nombre','=', $key[1]]])->get();
                    foreach ($id_p as $pro) {
                        $id_prod=$pro->id;
                    }
                    $id_e = DB::table('mesa')->join('estado_mesa','estado_mesa.id_mesa','=','mesa.id')->join('desayuno_mesa','mesa.id','=','desayuno_mesa.id_mesa')->where([['mesa.id','=', $clave],['estado_mesa.estado','Abierto'],['desayuno_mesa.id_desayuno',$id_prod]])->get();
                    foreach ($id_e as $eli) {
                        $id_el=$eli->id;
                    }
                    if ($key[2]==$key[3]) {
                        DB::table('desayuno_mesa')->where('id',$id_el)->delete();
                    }else{
                        DB::table('desayuno_mesa')->where('id',$id_el)->update(['cantidad' => ($key[2]-$key[3])]);
                    }
                }
                
            }
        }
        return back()->withInput();
    }
    
}
