<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-lg font-bold mb-4">Welcome, {{ Auth::user()->name }}!</h1>
                    <div class="space-y-4">
                        <!-- Section for Users -->
                        <div>
                            <h2 class="text-lg font-bold mb-2">Users</h2>
                            <a href="{{ route('users.index') }}" class="text-blue-600 hover:underline">
                                Manage Users
                            </a>
                        </div>

                        <!-- Section for Orders -->
                        <div>
                            <h2 class="text-lg font-bold mb-2">Orders</h2>
                            <div class="flex flex-col space-y-2">
                                <a href="{{ route('orders.index') }}" class="text-blue-600 hover:underline">
                                    Manage Orders
                                </a>
                                <a href="{{ route('orders.create') }}" class="text-blue-600 hover:underline">
                                    Create Order
                                </a>
                                <a href="{{ route('orders.archived') }}" class="text-blue-600 hover:underline">
                                    Archived Orders
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
