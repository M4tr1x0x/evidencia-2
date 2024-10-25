<!-- resources/views/dashboard.blade.php -->
<h1>Dashboard</h1>

<nav>
    <ul>
        <li><a href="{{ route('users.index') }}">Usuarios</a></li>
        <li><a href="{{ route('orders.index') }}">Órdenes</a></li>
        <li><a href="{{ route('orders.archived') }}">Órdenes Archivadas</a></li>
    </ul>
</nav>

<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Cerrar Sesión</button>
</form>
