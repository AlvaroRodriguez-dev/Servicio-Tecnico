<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Editar Equipo
        </h2>
    </x-slot>

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
</x-app-layout>
