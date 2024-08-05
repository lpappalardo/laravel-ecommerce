<?php
/** @var \App\Models\Book[]|\Illuminate\Database\Eloquent\Collection $books */
?>
<x-layout-main>
    <x-slot:title>Listado de Novedades</x-slot:title>

    <h1 class="mb-3">Listado de Novedades</h1>

    @if($publications->isNotEmpty())
        @auth
        <div class="mb-3">
            <a href="{{ route('publications.create.form') }}" class="btn button-principal">Agregar una Nueva Novedad</a>
        </div>
        @endauth

    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Fecha de Publicación</th>
            <th>Categorías</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>

        @foreach($publications as $publication)
        <tr>
            <td>{{ $publication->id }}</td>
            <td>{{ $publication->title }}</td>
            <td>{{ $publication->publication_date->format('d/m/Y') }}</td>
            <td>
                @forelse($publication->categories as $category)
                    <div class="badge bg-secondary">{{ $category->name }}</div>
                @empty
                    <i>Sin categorías asignadas</i>
                @endforelse
            </td>
            <td>
                <div class="d-flex">
                    <a href="{{ route('publications.view', ['id' => $publication->id]) }}" class="btn btn-primary">Ver</a>

                    @auth
                    <a href="{{ route('publications.edit.form', ['id' => $publication->id]) }}" class="ms-2 btn btn-secondary">Editar</a>

                    <a href="{{ route('publications.delete.form', ['id' => $publication->id]) }}" class="ms-2 btn btn-danger">Eliminar</a>
                    @endauth
                </div>
            </td>
        </tr>
        @endforeach

        </tbody>
    </table>
    @else
    <p>No hay novedades cargadas.  @auth Podés empezar por <a href="{{ route('publications.create.form') }}" class="btn button-principal">agregar una novedad</a>. @endauth</p>
    @endif
</x-layout-main>
