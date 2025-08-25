@extends('layouts.app')

@section('title', 'Órdenes de Servicio')

@section('content')
<h1>Órdenes de Servicio</h1>
<a href="{{ route('ordenes.create') }}" class="btn btn-success mb-3">Nueva Orden</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th><th>Cliente</th><th>Equipo</th><th>Descripción</th><th>Estado</th><th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($ordenes as $orden)
        <tr>
            <td>{{ $orden->id }}</td>
            <td>{{ $orden->cliente->nombre }}</td>
            <td>{{ $orden->equipo->marca }} - {{ $orden->equipo->modelo }}</td>
            <td>{{ $orden->descripcion }}</td>
            <td>
                @if($orden->estado == 'pendiente')
                    <span class="badge bg-warning">Pendiente</span>
                @elseif($orden->estado == 'en_proceso')
                    <span class="badge bg-primary">En Proceso</span>
                @else
                    <span class="badge bg-success">Finalizado</span>
                @endif
            </td>
            <td>
                <a href="{{ route('ordenes.edit', $orden) }}" class="btn btn-warning btn-sm">Editar</a>
                <form action="{{ route('ordenes.destroy', $orden) }}" method="POST" style="display:inline">
                    @csrf @method('DELETE')
                    <button onclick="return confirm('¿Eliminar orden?')" class="btn btn-danger btn-sm">Eliminar</button>
                </form>
                <a href="{{ route('ordenes.pdf', $orden) }}" class="btn btn-secondary">Descargar PDF</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
