@extends('layouts.app')

@section('title', 'Lista de Clientes')

@section('content')
<h1>Clientes</h1>
<a href="{{ route('clientes.create') }}" class="btn btn-success mb-3">Nuevo Cliente</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th><th>Nombre</th><th>Email</th><th>Teléfono</th><th>Equipos</th><th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($clientes as $cliente)
        <tr>
            <td>{{ $cliente->id }}</td>
            <td>{{ $cliente->nombre }}</td>
            <td>{{ $cliente->email }}</td>
            <td>{{ $cliente->telefono }}</td>
            <td>
                @if($cliente->equipos->count() > 0)
                    <ul>
                        @foreach($cliente->equipos as $equipo)
                            <li>{{ $equipo->marca }} - {{ $equipo->modelo }}</li>
                        @endforeach
                    </ul>
                @else
                    <em>Sin equipos</em>
                @endif
            </td>
            <td>
                <a href="{{ route('clientes.edit', $cliente) }}" class="btn btn-warning btn-sm">Editar</a>
                <form action="{{ route('clientes.destroy', $cliente) }}" method="POST" style="display:inline">
                    @csrf @method('DELETE')
                    <button onclick="return confirm('¿Eliminar?')" class="btn btn-danger btn-sm">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
