<?php
/** @var \App\Models\Book[]|\Illuminate\Database\Eloquent\Collection $books */
?>
<x-layout-main>
    <x-slot:title>Listado de Libros</x-slot:title>

    <h1 class="mb-3">Listado de Libros</h1>

    @if($books->isNotEmpty())
        @auth
        <div class="mb-3">
            <a href="{{ route('books.create.form') }}" class="btn button-principal">Agregar un Nuevo Libro</a>
        </div>
        @endauth

    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Precio</th>
            <th>Formato</th>
            <th>Generos</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>

        @foreach($books as $book)
        <tr>
            <td>{{ $book->id }}</td>
            <td>{{ $book->title }}</td>
            <td>${{ $book->price }}</td>
            <td>{{ $book->format->name }}</td>
            <td>
                @forelse($book->genres as $genre)
                    <div class="badge bg-secondary">{{ $genre->name }}</div>
                @empty
                    <i>Sin géneros asignados</i>
                @endforelse
            </td>
            <td>
                <div class="d-flex">
                    <a href="{{ route('books.view', ['id' => $book->id]) }}" class="btn btn-primary">Ver</a>

                    @auth
                    <a href="{{ route('books.edit.form', ['id' => $book->id]) }}" class="ms-2 btn btn-secondary">Editar</a>

                    <a href="{{ route('books.delete.form', ['id' => $book->id]) }}" class="ms-2 btn btn-danger">Eliminar</a>
                    @endauth
                </div>
            </td>
        </tr>
        @endforeach

        </tbody>
    </table>

    {{ $books->links() }}

    @else
    <p>No hay libros cargados. @auth Podés empezar por <a href="{{ route('books.create.form') }}" class="btn button-principal">agregar un libro</a>. @endauth </p>
    @endif
</x-layout-main>
