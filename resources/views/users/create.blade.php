<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Usuario') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('users.store') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="name" class="block text-gray-700">Nombre:</label>
                            <input type="text" id="name" name="name" class="w-full border-gray-300 rounded-lg shadow-sm" required>
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block text-gray-700">Correo Electrónico:</label>
                            <input type="email" id="email" name="email" class="w-full border-gray-300 rounded-lg shadow-sm" required>
                        </div>

                        <div class="mb-4">
                            <label for="password" class="block text-gray-700">Contraseña:</label>
                            <input type="password" id="password" name="password" class="w-full border-gray-300 rounded-lg shadow-sm" required>
                        </div>

                        <div class="mb-4">
                            <label for="password_confirmation" class="block text-gray-700">Confirmar Contraseña:</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" class="w-full border-gray-300 rounded-lg shadow-sm" required>
                        </div>

                        <div class="mb-4">
                            <label for="role_id" class="block text-gray-700">Rol:</label>
                            <select id="role_id" name="role_id" class="w-full border-gray-300 rounded-lg shadow-sm" required>
                                <option value="" disabled selected>Seleccione un rol</option>
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                                Crear Usuario
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
