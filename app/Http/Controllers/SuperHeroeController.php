<?php

namespace App\Http\Controllers;

use App\SuperHeroe;
use Illuminate\Http\Request;

class SuperHeroeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $super_heroe = SuperHeroe::select('super_heroes.id','super_heroes.name','super_heroes.house','actors.image as actor_img','super_heroes.actor_id','super_heroes.image')
        ->join('actors','actors.id','=','super_heroes.actor_id')
        ->get();
        return json_decode($super_heroe);
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return SuperHeroe::findorFail($id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $super_heroe = SuperHeroe::create($request->all());
        return response()->json($super_heroe,201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  number  $superHeroe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_superHeroe)
    {
        $super_heroe = SuperHeroe::findOrFail($id_superHeroe);
        $super_heroe->update($request->all());
        return response()->json($super_heroe,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  number $id_superHeroe
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_superHeroe)
    {
        $super_heroe = SuperHeroe::findOrFail($id_superHeroe);
        $super_heroe->delete();
        return response()->json(null,204);
    }
}
