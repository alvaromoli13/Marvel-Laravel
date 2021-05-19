<?php

namespace App\Http\Controllers;

use App\Personaje;
use Illuminate\Http\Request;

class PersonajeController extends Controller
{
    public function index()
    {
        $personajes = Personaje::all();
        return response()->json(['Personajes' => $personajes->toArray()]);  
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
            'descripcion' => 'required| max:150',
            'valoracion' => 'required',
            'imagen' => 'required|',
            'idSaga' => 'required',
        ]);

        Personaje::insert(['nombre'=>request()->nombre, 'descripcion'=>request()->descripcion, 'valoracion'=>request()->valoracion, 
        'imagen'=>request()->imagen, 'idSaga'=>request()->idSaga]);

        return response()->json(['Personaje' => 'Dato guardado'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $personaje = Personaje::where('id', '=', $id)->get();

        return response()->json(['Personaje' => $personaje]);
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
        $datosPersonaje = request()->except(['_token', '_method']);
        Personaje::where('id','=',$id)->update($datosPersonaje);

        return response()->json(['Personaje' => 'Dato guardado'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $personaje = Personaje::where('id',$id);
        $personaje->delete();

        return response()->json(['Personaje' => 'Personaje Eliminada'], 200);
    }
}
