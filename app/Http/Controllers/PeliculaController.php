<?php

namespace App\Http\Controllers;

use App\Pelicula;
use Illuminate\Http\Request;

class PeliculaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response->json_decode
     */
    public function index()
    {
        $pelicula = Pelicula::all();
        return json_decode($pelicula);
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Pelicula::findorFail($id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $peliculas = Pelicula::create($request->all());
        return response()->json($peliculas,201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  number  $id_pelicula
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_pelicula)
    {
        $peliculas = Pelicula::findOrFail($id_pelicula);
        $peliculas->update($request->all());
        return response()->json($peliculas,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  number  $id_pelicula
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_pelicula)
    {
        $peliculas = Pelicula::findOrFail($id_pelicula);
        $peliculas->delete();
        return response()->json(null,204);
    }
}
