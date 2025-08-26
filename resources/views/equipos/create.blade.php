<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Nuevo Equipo
        </h2>
    </x-slot>


    <form method="POST" action="{{ route('equipos.store') }}">
        @csrf
        <div class="mb-3">
            <label>Marca</label>
            <input name="marca" class="form-control">
        </div>
        <div class="mb-3">
            <label>Modelo</label>
            <input name="modelo" class="form-control">
        </div>
        <div class="mb-3">
            <label>Cliente</label>
            <select name="cliente_id" class="form-control">
                <option value="">-- Seleccione --</option>
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('equipos.index') }}" class="btn btn-secondary">Volver</a>
    </form>
</x-app-layout>
