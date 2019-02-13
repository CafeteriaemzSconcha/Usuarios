<?php

namespace usuarios\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;

class CocinaController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Guard $auth)
    {
        $aut=DB::table('users')->join('cargo','cargo.id_users','=','users.id')->where('users.id',Auth::guard()->user()->id)->get();
        if (strpos($aut, 'Caja')) {
            return redirect('caja');
        }else if(strpos($aut, 'Master')){
            return redirect('master');
        }  
        return view('homeCocina');
    }

}
