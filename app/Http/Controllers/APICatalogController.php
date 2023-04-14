<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\CatalogResource;
use App\Movie;
use App\Http\Requests;


class APICatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Movie::all();
        return CatalogResource::collection($id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function putRent($id) {
        $id = Movie::findOrFail($id);
        $id->rented = true;
        $id->save();
        return response()->json( ['error' => false,
        'msg' => 'La película se ha marcado como alquilada' ] );
    }

    public function putReturn($id) {
        $id = Movie::findOrFail( $id );
        $id->rented = false;
        $id->save();
        return response()->json( ['error' => false,
        'msg' => 'La película se ha marcado como alquilada' ] );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'year' => 'required|numeric',
            'title' => 'required|string',
            'director' => 'required|string',
            'poster' => 'required',
            'synopsis' => 'required'
        ]);

        $id = new Movie;
        $id->year = $request->input('year');
        $id->title = $request->input('title');
        $id->director = $request->input('director');
        $id->poster = $request->input('poster');
        $id->synopsis = $request->input('synopsis');
        $id->save();
        return new CatalogResource($id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movie = Movie::find($id);
        if( $movie ){
            return new CatalogResource($movie);
        }
        return "Movie no encontrada";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'year' => 'required|numeric',
            'title' => 'required|string',
            'director' => 'required|string',
            'poster' => 'required',
            'synopsis' => 'required'
        ]);

        $id = new Movie;
        $id->year = $request->input('year');
        $id->title = $request->input('title');
        $id->director = $request->input('director');
        $id->poster = $request->input('poster');
        $id->synopsis = $request->input('synopsis');
        $id->save();

        return new CatalogResource($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = Movie::findOrfail($id);
        if($id->delete()){
            return  new CatalogResource($id);
        }
        return "Error al borrar";
    }
}
