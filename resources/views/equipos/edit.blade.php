@extends('layouts.app')

@section('title', 'Editar Equipo')

@section('content')
<h1>Editar Equipo</h1>

<form method="POST" action="{{ route('equipos.update', $equipo) }}">
    @csrf @method('PUT')
    <div class="mb-3">
        <label>Marca</label>
        <input name="marca" class="form-control" value="{{ $equipo->marca }}">
    </div>
    <div class="mb-3">
        <label>Modelo</label>
        <input name="modelo" class="form-control" value="{{ $equipo->modelo }}">
    </div>
    <div class="mb-3">
        <label>Cliente</label>
        <select name="cliente_id" class="form-control">
            @foreach($clientes as $cliente)
                <option value="{{ $cliente->id }}" 
                    @if($cliente->id == $equipo->cliente_id) selected @endif>
                    {{ $cliente->nombre }}
                </option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Actualizar</button>
    <a href="{{ route('equipos.index') }}" class="btn btn-secondary">Volver</a>
</form>
@endsection
