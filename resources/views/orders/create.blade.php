
<h1>Crear Orden</h1>
<form method="POST" action="{{ route('orders.store') }}" enctype="multipart/form-data">
    @csrf
    <input type="text" name="invoice_number" placeholder="Número de Factura" required>
    
    <select name="user_id" required>
        @foreach($users as $user)
            <option value="{{ $user->id }}">{{ $user->name }}</option>
        @endforeach
    </select>

    <select name="status" required>
        <option value="in_process">En Proceso</option>
        <option value="on_route">En Ruta</option>
        <option value="delivered">Entregado</option>
    </select>

    <input type="file" name="evidence_photo" accept="image/*">
    
    <button type="submit">Guardar</button>
</form>
