<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestión de Usuarios') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ route('users.create') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                        Crear Usuario
                    </a>

                    <table class="table-auto w-full border-collapse border border-gray-300 mt-4">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="border border-gray-300 px-4 py-2">Nombre</th>
                                <th class="border border-gray-300 px-4 py-2">Correo Electrónico</th>
                                <th class="border border-gray-300 px-4 py-2">Rol</th>
                                <th class="border border-gray-300 px-4 py-2">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr class="text-center">
                                    <td class="border border-gray-300 px-4 py-2">{{ $user->name }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $user->email }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $user->role->name }}</td>
                                    <td class="border border-gray-300 px-4 py-2">
                                        <a href="{{ route('users.edit', $user->id) }}" class="px-4 py-2 rounded">
                                            Editar
                                        </a>
                                        <form method="POST" action="{{ route('users.destroy', $user->id) }}" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class=" px-4 py-2 rounded bg-red-500">
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
