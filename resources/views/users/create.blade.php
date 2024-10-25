<!-- resources/views/users/create.blade.php -->
<h1>Crear Usuario</h1>
<form method="POST" action="{{ route('users.store') }}">
    @csrf
    <input type="text" name="name" placeholder="Nombre" required>
    <input type="email" name="email" placeholder="Correo" required>
    <input type="password" name="password" placeholder="Contraseña" required>
    <select name="role_id" required>
        @foreach($roles as $role)
            <option value="{{ $role->id }}">{{ $role->name }}</option>
        @endforeach
    </select>
    <button type="submit">Crear</button>
</form>
