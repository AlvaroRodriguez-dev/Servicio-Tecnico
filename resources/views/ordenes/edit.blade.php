<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Editar Orden de Servicio
        </h2>
    </x-slot>

<form action="{{ route('ordenes.update', $ordene) }}" method="POST">
    @csrf @method('PUT')

    <div class="mb-3">
        <label for="cliente_id" class="form-label">Cliente</label>
        <select name="cliente_id" id="cliente_id" class="form-select" required>
            @foreach($clientes as $cliente)
                <option value="{{ $cliente->id }}" {{ $ordene->cliente_id == $cliente->id ? 'selected' : '' }}>
                    {{ $cliente->nombre }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="equipo_id" class="form-label">Equipo</label>
        <select name="equipo_id" id="equipo_id" class="form-select" required>
            @foreach($equipos as $equipo)
                <option value="{{ $equipo->id }}" {{ $ordene->equipo_id == $equipo->id ? 'selected' : '' }}>
                    {{ $equipo->marca }} - {{ $equipo->modelo }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="descripcion" class="form-label">Descripción</label>
        <textarea name="descripcion" class="form-control" required>{{ $ordene->descripcion }}</textarea>
    </div>

    <div class="mb-3">
        <label for="estado" class="form-label">Estado</label>
        <select name="estado" class="form-select" required>
            <option value="pendiente" {{ $ordene->estado=='pendiente'?'selected':'' }}>Pendiente</option>
            <option value="en_proceso" {{ $ordene->estado=='en_proceso'?'selected':'' }}>En Proceso</option>
            <option value="finalizado" {{ $ordene->estado=='finalizado'?'selected':'' }}>Finalizado</option>
        </select>
    </div>

    <button class="btn btn-primary">Actualizar</button>
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
                    let selected = equipo.id == {{ $ordene->equipo_id }} ? 'selected' : '' ;
                    equiposSelect.innerHTML += `<option value="${equipo.id}" ${selected}>${equipo.marca} - ${equipo.modelo}</option>`;
                });
            });
    }
});
</script>
</x-app-layout>
