<!-- resources/views/orders/index.blade.php -->
<h1>Lista de Órdenes</h1>
<a href="{{ route('orders.create') }}">Crear Orden</a>

<ul>
    @foreach($orders as $order)
        <li>
            Factura: {{ $order->invoice_number }} | Estado: {{ $order->status }} |
            Usuario: {{ $order->user->name }}

            <a href="{{ route('orders.edit', $order) }}">Editar</a>
            <form method="POST" action="{{ route('orders.destroy', $order) }}" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Eliminar</button>
            </form>
        </li>
    @endforeach
</ul>
