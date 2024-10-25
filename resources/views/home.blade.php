<h1>Buscar Orden</h1>

<form method="GET" action="{{ route('home') }}">
    <input type="text" name="invoice_number" placeholder="Número de Factura" required>
    <button type="submit">Buscar</button>
</form>

@if($order)
    <h2>Detalles de la Orden</h2>
    <p>Factura: {{ $order->invoice_number }}</p>
    <p>Estado: {{ $order->status }}</p>
    <img src="{{ asset('storage/' . $order->evidence_photo) }}" 
                 alt="Evidencia" 
                 style="max-width: 400px; max-height: 400px;">

@elseif(request('invoice_number'))
    <p>No se encontró una orden con ese número de factura.</p>
@endif
