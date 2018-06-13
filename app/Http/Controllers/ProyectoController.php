<?php

namespace Laravel\Http\Controllers;

use Laravel\Proyecto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 'proyecto index';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return 'proyecto create';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $proyecto = new Proyecto();
        $proyecto->nombre = $request->get('nombre');
        $proyecto->estado = 1;
        $proyecto->idusuario = Auth::id();
        $proyecto->save();
        return Redirect::to('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Laravel\Proyecto $proyecto
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proyecto=Proyecto::findOrFail($id);
        return view('proyecto.show',["proyecto"=>$proyecto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Laravel\Proyecto $proyecto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proyecto = Proyecto::find($id);
        return view("proyecto.edit", ["proyecto" => $proyecto]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Laravel\Proyecto $proyecto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $proyecto = Proyecto::findOrFail($id);
        $proyecto->nombre = $request->get("nombre");
        $proyecto->update();
        return Redirect::to('home/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Laravel\Proyecto $proyecto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $proyecto = Proyecto::find($id);
        $proyecto->estado = 0;
        $proyecto->update();
        return Redirect::to('/home');
    }
}
