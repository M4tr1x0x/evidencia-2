<!-- resources/views/orders/archived.blade.php -->
<h1>Órdenes Archivadas</h1>

<ul>
    @foreach($orders as $order)
        <li>
            Factura: {{ $order->invoice_number }} | Estado: {{ $order->status }}
            <form method="POST" action="{{ route('orders.restore', $order->id) }}" style="display:inline;">
                @csrf
                <button type="submit">Restaurar</button>
            </form>
        </li>
    @endforeach
</ul>
