<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Movie;
use Auth;

class CatalogController extends Controller {

	public function getShow($id){

		$id = Movie::findOrFail($id);
	        return view('catalog.show', compact('id'));
	}

	public function getCreate(){

		return view('catalog.create');
	}

	public function postCreate(Request $request){	
	
        $postCreate = $request->validate([
            'year' => 'required|numeric',
            'title' => 'required|string',
            'director' => 'required|string',
            'poster' => 'required',
            'synopsis' => 'required'
        ]);

        $id = Movie::create($postCreate);
   
        return redirect()->route('catalog.index')->with('success', 'Movie creada');
	}

	public function getIndex(){

		$pelicula = Movie::all();
		return view('catalog.index', compact('pelicula'));
	}


	public function getEdit($id){

   		$id =  Movie::findOrFail($id);
    	return view('catalog.edit', compact('id'));
	}

	public function putEdit(Request $request, $id){
        
        $putEdit = $request->validate([
            'year' => 'required|numeric',
            'title' => 'required|string',
            'director' => 'required|string',
            'poster' => 'required',
            'synopsis' => 'required'
        ]);

        Movie::whereId($id)->update($putEdit);

        return redirect('catalog/show/'.$id)->with('success', 'Movie actualizada con exito');
	}

	public function putRent(Request $request, $id){


        Movie::whereId($id)->update(['rented'=>True]);

        return redirect('catalog/show/'.$id)->with('success', 'Movie alquilada con exito');
	}

	public function putReturn(Request $request, $id){

		Movie::whereId($id)->update(['rented'=>False]);

        return redirect('catalog/show/'.$id)->with('success', 'Movie devuelta con exito');

	}

	public function deleteMovie($id){

		$id = Movie::findOrFail($id);
        $id->delete();
        return redirect()->route('catalog.index')->with('success', 'Movie borrada con exito');
	}
}

?>