<?php

namespace App\Http\Controllers;

use App\PeliculasGuardadas;

use Illuminate\Http\Request;

class PeliculasGuardadasController extends Controller
{
    public function index()
    {
        $guardado = PeliculasGuardadas::all();
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
            'idPelicula' => 'required',
        ]);

        PeliculasGuardadas::insert(['idUsuario'=>request()->idUsuario, 'idPelicula'=>request()->idPelicula]);

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
        $guardado = PeliculasGuardadas::findOrFail($id);

        return response()->json(['Guardado' => $guardado->toArray()]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\iWillGo  $iWillGo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idUsuario, $idPelicula)
    {
        $guardado = request()->except(['_token', '_method']);
        PeliculasGuardadas::where('idUsuario','=',$idUsuario)->where('idPelicula', '=', $idPelicula)->update($guardado);

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
        $guardado = PeliculasGuardadas::where('id',$id);
        $guardado->delete();

        return response()->json(['MeGusta' => 'Eliminado'], 200);
    }

    public function guardadosTotales($idPelicula)
    {
        $guardado = PeliculasGuardadas::where('idPelicula', '=', $idPelicula)->get();
        return response()->json(['Guardado' => $guardado]);
    }

    public function eliminar($idPelicula, $idUsuario)
    {
        $guardado = PeliculasGuardadas::where('idPelicula', '=', $idPelicula)->where('idUsuario', '=', $idUsuario);
        $guardado->delete();

        return response()->json(['MeGusta' => 'Eliminado'], 200);
    }
}
