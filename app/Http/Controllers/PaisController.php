<?php

namespace App\Http\Controllers;

use App\Pais;
use Illuminate\Http\Request;

class PaisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response->json_decode()
     */
    public function index()
    {
        $pais = Pais::all();
        return json_decode($pais);
    }

   /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Pais::findorFail($id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response->json_decode()
     */
    public function store(Request $request)
    {
        $pais = Pais::create($request->all());
        return response()->json($pais,201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  number $id_pais
     * @return \Illuminate\Http\Response->json_decode()
     */
    public function update(Request $request,$id_pais)
    {
        $pais = Pais::findOrFail($id_pais);
        $pais->update($request->all());
        return response()->json($pais,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  number $id_pais
     * @return \Illuminate\Http\Response->json_decode()
     */
    public function destroy($id_pais)
    {
        $pais = Pais::findOrFail($id_pais);
        $pais->delete();
        return response()->json(null,204);
    }
}
