<h1>Editar Usuario</h1>

<form method="POST" action="{{ route('users.update', $user->id) }}">
    @csrf
    @method('PUT')

    <input type="text" name="name" value="{{ $user->name }}" placeholder="Nombre" required>
    <input type="email" name="email" value="{{ $user->email }}" placeholder="Correo" required>
    
    <select name="role_id" required>
        <option value="" disabled>Seleccione un rol</option>
        @foreach($roles as $role)
            <option value="{{ $role->id }}" 
                {{ $user->role_id == $role->id ? 'selected' : '' }}>
                {{ $role->name }}
            </option>
        @endforeach
    </select>

    <button type="submit">Guardar Cambios</button>
</form>
