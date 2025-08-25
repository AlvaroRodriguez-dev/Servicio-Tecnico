@extends('layouts.app')

@section('title', 'Nueva Orden de Servicio')

@section('content')
<h1>Nueva Orden de Servicio</h1>

<form action="{{ route('ordenes.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="cliente_id" class="form-label">Cliente</label>
        <select name="cliente_id" id="cliente_id" class="form-select" required>
            <option value="">-- Seleccione un cliente --</option>
            @foreach($clientes as $cliente)
                <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="equipo_id" class="form-label">Equipo</label>
        <select name="equipo_id" id="equipo_id" class="form-select" required>
            <option value="">-- Seleccione primero un cliente --</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="descripcion" class="form-label">Descripción del problema</label>
        <textarea name="descripcion" class="form-control" required></textarea>
    </div>

    <div class="mb-3">
        <label for="estado" class="form-label">Estado</label>
        <select name="estado" class="form-select" required>
            <option value="pendiente">Pendiente</option>
            <option value="en_proceso">En Proceso</option>
            <option value="finalizado">Finalizado</option>
        </select>
    </div>

    <button class="btn btn-primary">Guardar</button>
</form>

<script>
document.getElementById('cliente_id').addEventListener('change', function() {
    let clienteId = this.value;
    let equiposSelect = document.getElementById('equipo_id');
    equiposSelect.innerHTML = '<option value="">Cargando...</option>';

    if(clienteId) {
        fetch(`/clientes/${clienteId}/equipos`)
            .then(response => response.json())
            .then(data => {
                equiposSelect.innerHTML = '<option value="">-- Seleccione un equipo --</option>';
                data.forEach(equipo => {
                    equiposSelect.innerHTML += `<option value="${equipo.id}">${equipo.marca} - ${equipo.modelo}</option>`;
                });
            });
    } else {
        equiposSelect.innerHTML = '<option value="">-- Seleccione primero un cliente --</option>';
    }
});
</script>
@endsection
