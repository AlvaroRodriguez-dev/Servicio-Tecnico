@extends('layouts.app')

@section('title', 'Equipos')

@section('content')
<h1>Equipos</h1>
<a href="{{ route('equipos.create') }}" class="btn btn-success mb-3">Nuevo Equipo</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th><th>Marca</th><th>Modelo</th><th>Cliente</th><th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($equipos as $equipo)
        <tr>
            <td>{{ $equipo->id }}</td>
            <td>{{ $equipo->marca }}</td>
            <td>{{ $equipo->modelo }}</td>
            <td>{{ $equipo->cliente->nombre }}</td>
            <td>
                <a href="{{ route('equipos.edit', $equipo) }}" class="btn btn-warning btn-sm">Editar</a>
                <form action="{{ route('equipos.destroy', $equipo) }}" method="POST" style="display:inline">
                    @csrf @method('DELETE')
                    <button onclick="return confirm('¿Eliminar?')" class="btn btn-danger btn-sm">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
