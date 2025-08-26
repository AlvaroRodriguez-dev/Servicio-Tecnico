<x-app-layout>
    <x-slot name="header">Crear Usuario</x-slot>

    <div class="container">
        <form action="{{ route('usuarios.update', $usuario) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3">
                <label>Nombre</label>
                <input type="text" name="name" class="form-control" value="{{ $usuario->name }}" required>
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{ $usuario->email }}" required>
            </div>
            <div class="mb-3">
                <label>Nueva Contraseña (opcional)</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="mb-3">
                <label>Confirmar Contraseña</label>
                <input type="password" name="password_confirmation" class="form-control">
            </div>
            <div class="mb-3">
                <label>Rol</label>
                <select name="role" class="form-control" required>
                    <option value="admin" {{ $usuario->role == 'admin' ? 'selected' : '' }}>Administrador</option>
                    <option value="tecnico" {{ $usuario->role == 'tecnico' ? 'selected' : '' }}>Técnico</option>
                    <option value="recepcion" {{ $usuario->role == 'recepcion' ? 'selected' : '' }}>Recepción</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Actualizar</button>
            <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</x-app-layout>
