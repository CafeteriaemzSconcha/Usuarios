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
            return redirect('caja');
        }else if(strpos($test, 'Cocina') !== false){
            return redirect('cocina');
        }else if(strpos($test, 'Master') !== false){
            return redirect('master');
        }
    }
}
