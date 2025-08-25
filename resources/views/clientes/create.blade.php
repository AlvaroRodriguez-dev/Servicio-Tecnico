@extends('layouts.app')

@section('content')
<h1>Nuevo Cliente</h1>

<form method="POST" action="{{ route('clientes.store') }}">
    @csrf
    <input name="nombre" placeholder="Nombre">
    <input name="email" placeholder="Email">
    <input name="telefono" placeholder="Teléfono">
    <button type="submit">Guardar</button>
</form>
<a href="{{ route('clientes.index') }}">Volver</a>
@endsection
