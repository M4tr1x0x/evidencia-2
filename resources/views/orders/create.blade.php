<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Orden') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('orders.store') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="invoice_number" class="block text-gray-700">Número de Factura:</label>
                            <input type="text" id="invoice_number" name="invoice_number" class="w-full border-gray-300 rounded-lg shadow-sm">
                        </div>

                        <div class="mb-4">
                            <label for="customer_name" class="block text-gray-700">Nombre del Cliente:</label>
                            <input type="text" id="customer_name" name="customer_name" class="w-full border-gray-300 rounded-lg shadow-sm">
                        </div>

                        <div class="mb-4">
                            <label for="customer_number" class="block text-gray-700">Número de Cliente:</label>
                            <input type="text" id="customer_number" name="customer_number" class="w-full border-gray-300 rounded-lg shadow-sm">
                        </div>

                        <div class="mb-4">
                            <label for="fiscal_data" class="block text-gray-700">Datos Fiscales:</label>
                            <input type="text" id="fiscal_data" name="fiscal_data" class="w-full border-gray-300 rounded-lg shadow-sm">
                        </div>

                        <div class="mb-4">
                            <label for="delivery_address" class="block text-gray-700">Dirección de Entrega:</label>
                            <input type="text" id="delivery_address" name="delivery_address" class="w-full border-gray-300 rounded-lg shadow-sm">
                        </div>

                        <div class="mb-4">
                            <label for="notes" class="block text-gray-700">Notas:</label>
                            <textarea id="notes" name="notes" class="w-full border-gray-300 rounded-lg shadow-sm"></textarea>
                        </div>

                        <div class="flex justify-end mt-6">
                            <button type="submit" class="px-6 py-2 rounded-lg">
                                Crear Orden
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
