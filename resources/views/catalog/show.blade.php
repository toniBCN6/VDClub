@extends('layouts.master')
@section('title', 'Vista detallada')
@section('content')
<br><br>
<div class="row">
	<div class="col-sm-4">
		<img src="{{$id->poster}}" class="img-thumbnail"/>
	</div>
	<div class="col-sm-8">
		<h3>{{$id->title}}</h3>
		<p class="text-justify">Año: {{$id->year}}</p>
		<p class="text-justify">Director: {{$id->director}}</p>
		<span class="text-justify font-weight-bold">Sinpsis: </span> <span>{{$id->synopsis}}</span>	
			@if(auth()->user()->is_admin == 0)	
				@if ($id->rented == true)
				    <br><br><span class="font-weight-bold">Estado:</span> Pelicula alquilada
				    <br><br>
				    <form method="POST" action="{{route('catalog.return',$id->id)}}" method="POST" style="display:inline">
						@csrf
						@method('PUT') 
						<button type="submit" class="btn btn-warning" style="display:inline">
						<i class="fa fa-retweet" aria-hidden="true"> Devolver pelicula</i>
						</button>
					</form>
				@else
				    <br><br><span class="font-weight-bold">Estado:</span> Pelicula disponible
				    <br><br>
				    <form action="{{route('catalog.rent',$id->id)}}" method="POST" style="display:inline">
					    @csrf
					    @method('PUT')
					    <button class="btn btn-success" type="submit" style="display:inline">
					    <i class="fa fa-get-pocket" aria-hidden="true"> Alquilar</i>
						</button>
					</form>
				@endif
			@endif	
		<br><br>

		@if(auth()->user()->is_admin == 1)
		<a class="btn btn-warning" href="{{ url('/catalog/edit/'.$id->id)}}" role="button"><i class="fa fa-pencil" aria-hidden="true"> Editar pelicula</i></a>
		<form action="{{route('catalog.delete',$id->id)}}" method="POST" style="display:inline">
		    @csrf
		    @method('delete')
		    <button class="btn btn-danger" type="submit" style="display:inline">
		    <i class="fa fa-trash" aria-hidden="true"> Borrar pelicula</i>
			</button>
		</form>
		@endif
		<a class="btn btn-info" href="{{ url('/catalog')}}" role="button"><i class="fa fa-arrow-left" aria-hidden="true"> Volver al listado</i></a>
	</div>
</div>
@stop