<?php
/** @var \App\Models\Book[]|\Illuminate\Database\Eloquent\Collection $books */
?>
<x-layout-main>
    <x-slot:title>Listado de Usuarios</x-slot:title>

    <h1 class="mb-3">Listado de Usuarios</h1>

    @if($users->isNotEmpty())
        {{-- @auth
        <div class="mb-3">
            <a href="{{ route('usuarios.create.form') }}" class="btn button-principal">Agregar un Nuevo Usuario</a>
        </div>
        @endauth --}}

    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>

        @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                <div class="d-flex">
                    <a href="{{ route('users.view', ['id' => $user->id]) }}" class="btn btn-primary">Ver</a>
                </div>
            </td>
        </tr>
        @endforeach

        </tbody>
    </table>
    @else
    <p>No hay usuarios cargados.  @auth Podés empezar por <a href="{{ route('usuarios.create.form') }}" class="btn button-principal">agregar un usuario</a>. @endauth</p>
    @endif
</x-layout-main>
