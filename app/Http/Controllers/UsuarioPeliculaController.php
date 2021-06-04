<?php

namespace App\Http\Controllers;

use App\Usuario_Pelicula;

use Illuminate\Http\Request;

class UsuarioPeliculaController extends Controller
{
    public function index()
    {
        $meGusta = Usuario_Pelicula::all();
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
            'idPelicula' => 'required',
        ]);

        Usuario_Pelicula::insert(['idUsuario'=>request()->idUsuario, 'idPelicula'=>request()->idPelicula]);

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
        $meGusta = Usuario_Pelicula::findOrFail($id);

        return response()->json(['MeGusta' => $meGusta->toArray()]);
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
        $datosMeGusta = request()->except(['_token', '_method']);
        Usuario_Pelicula::where('idUsuario','=',$idUsuario)->where('idPelicula', '=', $idPelicula)->update($datosMeGusta);

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
        $meGusta = Usuario_Pelicula::where('id',$id);
        $meGusta->delete();

        return response()->json(['MeGusta' => 'Eliminado'], 200);
    }

    public function meGustasTotales($idPelicula)
    {
        $meGusta = Usuario_Pelicula::where('idPelicula', '=', $idPelicula)->get();
        return response()->json(['MeGusta' => $meGusta]);
    }

    public function eliminar($idPelicula, $idUsuario)
    {
        $meGusta = Usuario_Pelicula::where('idPelicula', '=', $idPelicula)->where('idUsuario', '=', $idUsuario);
        $meGusta->delete();

        return response()->json(['MeGusta' => 'Eliminado'], 200);
    }
}
