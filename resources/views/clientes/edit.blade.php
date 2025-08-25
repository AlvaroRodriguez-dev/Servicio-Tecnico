@extends('layouts.app')

@section('content')
<h1>Editar Cliente</h1>

<form method="POST" action="{{ route('clientes.update', $cliente) }}">
    @csrf @method('PUT')
    <input name="nombre" value="{{ $cliente->nombre }}">
    <input name="email" value="{{ $cliente->email }}">
    <input name="telefono" value="{{ $cliente->telefono }}">
    <button type="submit">Actualizar</button>
</form>
<a href="{{ route('clientes.index') }}">Volver</a>
@endsection
