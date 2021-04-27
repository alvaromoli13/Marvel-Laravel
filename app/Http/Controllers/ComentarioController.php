<?php

namespace App\Http\Controllers;

use App\Comentario;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    public function index()
    {
        $comentarios = Comentario::all();
        return response()->json(['Comentarios' => $comentarios->toArray()]);  
    }

    // , $this->successStatus

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'descripcion' => 'required| max:124',
            'idUsuario' => 'required',
            'idPelicula' => 'required',
        ]);

        Comentario::insert(['descripcion'=>request()->descripcion, 'idUsuario'=>request()->idUsuario, 
        'idPelicula'=>request()->idPelicula]);

        return response()->json(['Comentario' => 'Dato guardado'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comentario = Comentario::where('id', '=', $id)->get();

        return response()->json(['Comentario' => $comentario]);
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosComentario = request()->except(['_token', '_method']);
        Comentario::where('id','=',$id)->update($datosComentario);

        return response()->json(['Comentario' => 'Dato guardado'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comentario = Comentario::where('id',$id);
        $comentario->delete();

        return response()->json(['Comentario' => 'Comentario Eliminada'], 200);
    }

    public function ComentarioAsociadoPelicula($idPelicula){
        $comentario = Comentario::where('idPelicula', '=', $idPelicula)->get();
        return response()->json(['Comentario' => $comentario]);
    }
}
