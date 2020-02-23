<?php

namespace App\Http\Controllers;

use App\Modulo;
use Illuminate\Http\Request;
use App\Http\Requests\ModuloRequest;

class ModuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modulos = Modulo::orderBy('nombre')->paginate(3);
        return view('modulos.index', compact('modulos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modulos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ModuloRequest $request)
    {
        $datos = $request->validated();
        $modulo = new Modulo();
        $modulo->nombre=ucwords($datos['nombre']);
        $modulo->horas=$datos['horas'];
        $modulo->save();
        return redirect()->route('modulos.index')->with('mensaje', 'Módulo creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Modulo  $modulo
     * @return \Illuminate\Http\Response
     */
    public function show(Modulo $modulo)
    {
        return view('modulos.detalle', compact('modulo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Modulo  $modulo
     * @return \Illuminate\Http\Response
     */
    public function edit(Modulo $modulo)
    {
        return view('modulos.edit', compact('modulo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Modulo  $modulo
     * @return \Illuminate\Http\Response
     */
    public function update(ModuloRequest $request, Modulo $modulo)
    {
        $datos = $request->validated();
        $modulo->nombre=ucwords($datos['nombre']);
        $modulo->horas=$datos['horas'];
        $modulo->update($request->all());
        return redirect()->route('modulos.index')->with('mensaje', 'Módulo modificado correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Modulo  $modulo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Modulo $modulo)
    {
        $modulo->delete();
        return redirect()->route('modulos.index')->with('mensaje', 'Módulo borrado correctamente');
    }
}
