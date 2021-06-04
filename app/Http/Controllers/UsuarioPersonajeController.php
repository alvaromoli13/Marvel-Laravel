<?php

namespace App\Http\Controllers;
use App\Usuario_Personaje;

use Illuminate\Http\Request;

class UsuarioPersonajeController extends Controller
{
    public function index()
    {
        $meGusta = Usuario_Personaje::all();
        return response()->json(['MeGusta' => $meGusta->toArray()]);
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

        Usuario_Personaje::insert(['idUsuario'=>request()->idUsuario, 'idPersonaje'=>request()->idPersonaje]);

        return response()->json(['MeGusta' => 'Dato guardado'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\iWillGo  $iWillGo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $meGusta = Usuario_Personaje::findOrFail($id);

        return response()->json(['MeGusta' => $meGusta->toArray()]);
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
        $datosMeGusta = request()->except(['_token', '_method']);
        Usuario_Personaje::where('idUsuario','=',$idUsuario)->where('idPersonaje', '=', $idPersonaje)->update($datosMeGusta);

        return response()->json(['MeGusta' => 'Ir actualizado'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\iWillGo  $iWillGo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $meGusta = Usuario_Personaje::where('id',$id);
        $meGusta->delete();

        return response()->json(['MeGusta' => 'Eliminado'], 200);
    }

    public function meGustasTotales($idPersonaje)
    {
        $meGusta = Usuario_Personaje::where('idPersonaje', '=', $idPersonaje)->get();
        return response()->json(['MeGusta' => $meGusta]);
    }

    public function eliminar($idPersonaje, $idUsuario)
    {
        $meGusta = Usuario_Personaje::where('idPersonaje', '=', $idPersonaje)->where('idUsuario', '=', $idUsuario);
        $meGusta->delete();

        return response()->json(['MeGusta' => 'Eliminado'], 200);
    }

}
