@extends('master')
@section('title', 'Contacto')
@section('content')
<h1 >Nosotros</h1>
<p>Mi nombre es {{$nombreenviado}}</p>
@if ($nombreenviado=='Julio')
<p>Hola Julio</p>
@else
<p> Hola desconocido</p>
@endif
@for ($i = 0; $i < 10; $i++)
The current value is {{ $i }}</br>
@endfor
@endsection