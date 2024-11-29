<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Usuario') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('users.update', $user->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="name" class="block text-gray-700">Nombre:</label>
                            <input type="text" id="name" name="name" value="{{ $user->name }}" class="w-full border-gray-300 rounded-lg shadow-sm" required>
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block text-gray-700">Correo Electrónico:</label>
                            <input type="email" id="email" name="email" value="{{ $user->email }}" class="w-full border-gray-300 rounded-lg shadow-sm" required>
                        </div>

                        <div class="mb-4">
                            <label for="role_id" class="block text-gray-700">Rol:</label>
                            <select id="role_id" name="role_id" class="w-full border-gray-300 rounded-lg shadow-sm" required>
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>
                                        {{ $role->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit" class="px-4 py-2 rounded">
                                Guardar Cambios
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
