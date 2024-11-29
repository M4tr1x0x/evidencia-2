<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Orden') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if ($errors->any())
                        <div class="mb-4 text-red-500">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('orders.update', $order->id) }}">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-4">
                            <label for="customer_name" class="block text-gray-700">Nombre del Cliente:</label>
                            <input type="text" id="customer_name" name="customer_name" value="{{ old('customer_name', $order->customer_name) }}" class="w-full border-gray-300 rounded-lg shadow-sm">
                        </div>

                        <div class="mb-4">
                            <label for="status" class="block text-gray-700">Estado:</label>
                            <select id="status" name="status" class="w-full border-gray-300 rounded-lg shadow-sm">
                                <option value="Ordered" {{ $order->status == 'Ordered' ? 'selected' : '' }}>Ordenado</option>
                                <option value="In Process" {{ $order->status == 'In Process' ? 'selected' : '' }}>En Proceso</option>
                                <option value="In Route" {{ $order->status == 'In Route' ? 'selected' : '' }}>En Ruta</option>
                                <option value="Delivered" {{ $order->status == 'Delivered' ? 'selected' : '' }}>Entregado</option>
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

