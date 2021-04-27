<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Saga;

class SagaController extends Controller
{
    public function index()
    {
        $sagas = Saga::all();
        return response()->json(['Sagas' => $sagas->toArray()]);  
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
            'estreno' => 'required| max:100',
        ]);

        Saga::insert(['nombre'=>request()->nombre, 'estreno'=>request()->estreno]);

        return response()->json(['Saga' => 'Dato guardado'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $saga = Saga::where('id', '=', $id)->get();

        return response()->json(['Saga' => $saga]);
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
        $datosSagas = request()->except(['_token', '_method']);
        Saga::where('id','=',$id)->update($datosSagas);

        return response()->json(['Saga' => 'Dato guardado'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $saga = Saga::where('id',$id);
        $saga->delete();
        // offer::destroy($oferta);

        return response()->json(['Saga' => 'Oferta Eliminada'], 200);
    }
}
