<!-- resources/views/orders/edit.blade.php -->
<h1>Editar Orden</h1>
<form method="POST" action="{{ route('orders.update', $order) }}">
    @csrf
    @method('PUT')
    <input type="text" name="invoice_number" value="{{ $order->invoice_number }}" required>
    <select name="user_id" required>
        @foreach($users as $user)
            <option value="{{ $user->id }}" {{ $order->user_id == $user->id ? 'selected' : '' }}>
                {{ $user->name }}
            </option>
        @endforeach
    </select>
    <select name="status" required>
        <option value="in_process" {{ $order->status == 'in_process' ? 'selected' : '' }}>En proceso</option>
        <option value="on_route" {{ $order->status == 'on_route' ? 'selected' : '' }}>En ruta</option>
        <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Entregado</option>
    </select>
    <button type="submit">Actualizar</button>
</form>
