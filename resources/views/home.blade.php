@extends('layouts.master')
@section('title', 'Pagina principal')
@section('content')
<div class="card">
    <div class="card-header">Dashboard</div>
    <div class="card-body">
        @if(auth()->user()->is_admin == 1)
            <div class=”panel-heading”>Bienvenido administrador tienes acceso al CRUD!</div>
        @else
            <div class=”panel-heading”>Bienvenido cliente, entre tus opciones está alquilar y devolver peliculas!</div>
        @endif
    </div>
</div>
@endsection