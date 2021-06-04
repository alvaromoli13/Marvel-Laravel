<?php

namespace App\Http\Controllers;

use App\PersonajeGuardado;

use Illuminate\Http\Request;

class PersonajeGuardadoController extends Controller
{
    public function index()
    {
        $guardado = PersonajeGuardado::all();
        return response()->json(['Guardado' => $guardado->toArray()]);
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'idUsuario' => 'required',
            'idPersonaje' => 'required',
        ]);

        PersonajeGuardado::insert(['idUsuario'=>request()->idUsuario, 'idPersonaje'=>request()->idPersonaje]);

        return response()->json(['Guardado' => 'Dato guardado'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\iWillGo  $iWillGo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $guardado = PersonajeGuardado::findOrFail($id);

        return response()->json(['Guardado' => $guardado->toArray()]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\iWillGo  $iWillGo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idUsuario, $idPersonaje)
    {
        $guardado = request()->except(['_token', '_method']);
        PersonajeGuardado::where('idUsuario','=',$idUsuario)->where('idPersonaje', '=', $idPersonaje)->update($guardado);

        return response()->json(['Guardado' => 'Ir actualizado'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\iWillGo  $iWillGo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $guardado = PersonajeGuardado::where('id',$id);
        $guardado->delete();

        return response()->json(['MeGusta' => 'Eliminado'], 200);
    }

    public function guardadosTotales($idPersonaje)
    {
        $guardado = PersonajeGuardado::where('idPersonaje', '=', $idPersonaje)->get();
        return response()->json(['Guardado' => $guardado]);
    }

    public function eliminar($idPersonaje, $idUsuario)
    {
        $guardado = PersonajeGuardado::where('idPersonaje', '=', $idPersonaje)->where('idUsuario', '=', $idUsuario);
        $guardado->delete();

        return response()->json(['MeGusta' => 'Eliminado'], 200);
    }
}
