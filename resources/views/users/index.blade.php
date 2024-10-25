<!-- resources/views/users/index.blade.php -->
<h1>Lista de Usuarios</h1>
<a href="{{ route('users.create') }}">Crear Usuario</a>

<ul>
    @foreach($users as $user)
        <li>
            {{ $user->name }} - {{ $user->role->name }}
            <a href="{{ route('users.edit', $user) }}">Editar</a>
            <form method="POST" action="{{ route('users.destroy', $user) }}" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Eliminar</button>
            </form>
        </li>
    @endforeach
</ul>
