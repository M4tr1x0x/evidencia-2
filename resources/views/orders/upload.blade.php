<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Subir Foto de Evidencia') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-lg font-bold mb-4">Subir Foto de Evidencia</h1>
                    
                    <form method="POST" action="{{ route('orders.uploadPhoto', $order->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="photo" class="block text-gray-700">Seleccionar Foto:</label>
                            <input type="file" id="photo" name="photo" accept="image/*" class="w-full border-gray-300 rounded-lg shadow-sm" required>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                                Subir Foto
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
