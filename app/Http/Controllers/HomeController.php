<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Kreait\Firebase\Auth;
use \Illuminate\Support\Facades\Auth as AuthLara;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proyectos=DB::table('proyecto_usuario')
            ->where('usuario_id','=',AuthLara::user()->id)
            ->join('proyecto as pro','pro.id','proyecto_id')
            ->orderBy('id','desc')
            ->paginate(3);
        return view('home',["proyectos"=>$proyectos]);
    }
}
