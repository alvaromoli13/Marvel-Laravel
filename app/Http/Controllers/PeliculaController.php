<?php

namespace App\Http\Controllers;

use App\Pelicula;
use Illuminate\Http\Request;

class PeliculaController extends Controller
{
    public function index()
    {
        $offers = Pelicula::all();
        return response()->json(['Ofertas' => $offers->toArray()]);  
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
            'description' => 'required| max:100',
            'assessment' => 'required| max:100',
            'enterprise_id' => 'required| max:100',
            'start_date' => 'required| max:100',
            'start_time' => 'required| max:100',
            'finish_time' => 'required| max:100',
            'music_direct' => 'required| max:100',
            'sport_direct' => 'required| max:100',

        ]);

        Pelicula::insert(['name'=>request()->name, 'description'=>request()->description, 'assessment'=>request()->assessment, 
        'enterprise_id'=>request()->enterprise_id, 'start_date'=>request()->start_date, 'start_time'=>request()->start_time,
        'finish_time'=>request()->finish_time,  
        'music_direct'=>request()->music_direct, 'sport_direct'=>request()->sport_direct]);

        return response()->json(['Oferta' => 'Dato guardado'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $offer = Pelicula::where('id', '=', $id)->with('Enterprise')->get();

        return response()->json(['Oferta' => $offer]);
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
        $datosOferta = request()->except(['_token', '_method']);
        Pelicula::where('id','=',$id)->update($datosOferta);

        return response()->json(['Oferta' => 'Dato guardado'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $oferta = Pelicula::where('id',$id);
        $oferta->delete();
        // offer::destroy($oferta);

        return response()->json(['Oferta' => 'Oferta Eliminada'], 200);
    }
}
