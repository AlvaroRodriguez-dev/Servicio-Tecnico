<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listado de Clientes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg flex justify-between items-center">
                <h3 class="text-lg font-medium text-gray-900">Clientes Registrados</h3>
                <a href="{{ route('clientes.create') }}" 
                   class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md text-sm font-medium shadow">
                    Nuevo Cliente
                </a>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <!-- Tabla responsiva -->
                <div class="overflow-x-auto">
                    <table class="min-w-full border border-gray-200 divide-y divide-gray-200">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">ID</th>
                                <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Nombre</th>
                                <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Email</th>
                                <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Teléfono</th>
                                <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Equipos</th>
                                <th class="px-4 py-2 text-center text-sm font-semibold text-gray-700">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($clientes as $cliente)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-4 py-2 text-sm text-gray-800">{{ $cliente->id }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-800">{{ $cliente->nombre }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-800">{{ $cliente->email }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-800">{{ $cliente->telefono }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-800">
                                        @if($cliente->equipos->count() > 0)
                                            <ul class="list-disc pl-5 text-gray-600">
                                                @foreach($cliente->equipos as $equipo)
                                                    <li>{{ $equipo->marca }} - {{ $equipo->modelo }}</li>
                                                @endforeach
                                            </ul>
                                        @else
                                            <em class="text-gray-500">Sin equipos</em>
                                        @endif
                                    </td>
                                    <td class="px-4 py-2 text-sm text-center">
                                        <a href="{{ route('clientes.edit', $cliente) }}" 
                                           class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded-md text-xs font-medium shadow">
                                           Editar
                                        </a>
                                        <form action="{{ route('clientes.destroy', $cliente) }}" method="POST" class="inline">
                                            @csrf @method('DELETE')
                                            <button onclick="return confirm('¿Eliminar este cliente?')" 
                                                    class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-md text-xs font-medium shadow">
                                                Eliminar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
