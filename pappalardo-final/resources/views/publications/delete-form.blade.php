<?php
/** @var \App\Models\Book $book */
?>
<x-layout-main>
    <x-slot:title>Confirmación necesaria para eliminar la novedad {{ $publication->title }}</x-slot:title>

    <h1>Confirmación Necesaria</h1>

    <p>Estas por eliminar la siguiente novedad, y se necesita Confirmar la acción.</p>

    <hr>

    <section>
        <h2 class="mb-3">{{ $publication->title }}</h2>
        <h3 class="mb-3">{{ $publication->subtitle }}</h3>

        @if ($publication->cover !== null && \Storage::exists($publication->cover))
                    <img src="{{ \Storage::url($publication->cover) }}" alt="{{ $publication->cover_description }}"/>
        @endif

        <dl class="mb-3">
            <dt>Autor</dt>
            <dd>{{ $publication->author }}</dd>
            <dt>Fecha de publicación</dt>
            <dd>{{ $publication->publication_date->format('d/m/Y') }}</dd>
            <dt>Categorías</dt>
            <dd>
                @forelse($publication->categories as $category)
                    <div class="badge bg-secondary">{{ $category->name }}</div>
                @empty
                    <i>Sin categorías asignadas</i>
                @endforelse
            </dd>
        </dl>

        <h4 class="mb-3">Contenido</h4>
        <div>{{ $publication->content }}</div>
    </section>

    <hr>

    <form action="{{ route('publications.delete.process', ['id' => $publication->id]) }}" method="post" class="ms-2">
        @csrf
        <button type="submit" class="btn btn-danger">Confirmar Eliminación</button>
    </form>

</x-layout-main>