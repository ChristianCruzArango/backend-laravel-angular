<?php

namespace App\Http\Controllers;

use App\Actor;
use Illuminate\Http\Request;

class ActorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response->json_decode()
     */
    public function index()
    {
        $actor = Actor::select('actors.id','actors.name as name','actors.age','pais.name as pais_id','actors.image')
                        ->join('pais','actors.pais_id','=','pais.id')
                        ->get();
        return json_decode($actor);
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Actor::findorFail($id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response->json_decode()
     */
    public function store(Request $request)
    {
        $actor = Actor::create($request->all());
        return response()->json($actor,201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  number $id_actor
     * @return \Illuminate\Http\Response->json_decode()
     */
    public function update(Request $request,$id_actor)
    {
       $actor = Actor::findOrFail($id_actor);
       $actor->update($request->all());
       return response()->json($actor,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  number $id_actor
     * @return \Illuminate\Http\Response->json_decode()
     */
    public function destroy($id_actor)
    {
        $actor = Actor::findOrFail($id_actor);
        $actor->delete();
        return response()->json(null,204);
    }
}
