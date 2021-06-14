<?php

namespace App\Http\Controllers;

use App\Pelicula;
use Illuminate\Http\Request;

class PeliculaController extends Controller
{
    public function index()
    {
        $peliculas = Pelicula::all();
        return response()->json(['Peliculas' => $peliculas->toArray()]);  
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
            'nombre' => 'required| max:100',
            'idSaga' => 'required',
            'estreno' => 'required',
            'imagen' => 'required| max:100',
            'sipnosis' => 'required',
        ]);

        Pelicula::insert(['nombre'=>request()->nombre, 'idSaga'=>request()->idSaga, 'estreno'=>request()->estreno, 
        'imagen'=>request()->imagen, 'sipnosis'=>request()->sipnosis]);

        return response()->json(['Pelicula' => 'Dato guardado'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pelicula = Pelicula::where('id', '=', $id)->get();

        return response()->json(['Pelicula' => $pelicula]);
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
        $datosPelicula = request()->except(['_token', '_method']);
        Pelicula::where('id','=',$id)->update($datosPelicula);

        return response()->json(['Pelicula' => 'Dato guardado'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pelicula = Pelicula::where('id',$id);
        $pelicula->delete();

        return response()->json(['Pelicula' => 'Pelicula Eliminada'], 200);
    }

}
