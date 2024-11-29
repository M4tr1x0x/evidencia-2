<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestión de Órdenes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-lg font-bold mb-4">Lista de Órdenes</h1>

                    <table class="table-auto w-full border-collapse border border-gray-300">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="border border-gray-300 px-4 py-2"># Factura</th>
                                <th class="border border-gray-300 px-4 py-2">Cliente</th>
                                <th class="border border-gray-300 px-4 py-2">Estado</th>
                                <th class="border border-gray-300 px-4 py-2">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr class="text-center">
                                    <td class="border border-gray-300 px-4 py-2">{{ $order->invoice_number }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $order->customer_name }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ ucfirst($order->status) }}</td>
                                    <td class="border border-gray-300 px-4 py-2">
                                        <a href="{{ route('orders.edit', $order->id) }}" class="px-4 py-2 rounded">
                                            Editar
                                        </a>
                                        <form method="POST" action="{{ route('orders.delete', $order->id) }}" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-4 py-2 rounded">
                                                Eliminar
                                            </button>
                                        </form>
                                        @if($order->status === 'In Route' || $order->status === 'Delivered')
                                            <form method="POST" action="{{ route('orders.uploadPhoto', $order->id) }}" enctype="multipart/form-data" class="inline-block">
                                                @csrf
                                                <input type="file" name="photo" accept="image/*" class="hidden" id="photo-{{ $order->id }}" onchange="this.form.submit()">
                                                <label for="photo-{{ $order->id }}" class="px-4 py-2 rounded">
                                                    Subir Foto
                                                </label>
                                            </form>
                                        @endif
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
