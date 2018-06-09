<?php

namespace App\Http\Controllers;

use App\Proyecto;
use Illuminate\Support\Facades\Auth;

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
        $proyectos = Proyecto::where("idusuario", "=", Auth::user()->id)
            ->where("estado", "=", 1)
            ->paginate(10);
        return view('home', ["proyectos" => $proyectos]);
    }
}
