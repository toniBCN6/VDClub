@extends('layouts.master')
@section('title', 'Editar pelicula')
@section('content')
<div class="row" style="margin-top:40px">
   <div class="offset-md-3 col-md-6">
      <div class="card">
         <div class="card-header text-center">
            Modificar película
         </div>
         <div class="card-body" style="padding:30px">
         	@if(auth()->user()->is_admin == 1)
			 <form method="POST">
			    @csrf
			    @method('PUT') 
	            <div class="form-group">
	               <label for="title">Título</label>
	               <input type="text" name="title" id="title" value="{{$id->title}}" class="form-control">
	            </div>

	            <div class="form-group">
	            	<label for="year">Año</label>
	               <input id="year" name="year" type="text" value="{{$id->year}}" class="form-control">
	            </div>

	            <div class="form-group">
	            	<label for="director">Director</label>
	               <input id="director" name="director" type="text" value="{{$id->director}}" class="form-control">
	            </div>

	            <div class="form-group">
	            	<label for="image">Imagen</label>
	               <input id="poster" name="poster" type="text" value="{{$id->poster}}" class="form-control">
	            </div>

	            <div class="form-group">
	               <label for="synopsis">Resumen</label>
	               <textarea name="synopsis" name="synopsis" id="synopsis" class="form-control" rows="3">{{$id->synopsis}}</textarea>
	            </div>

	            <div class="form-group text-center">
	               <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
	                   Modificar película
	               </button>
	            </div>
            </form>
            @endif
         </div>
      </div>
   </div>
</div>
@stop