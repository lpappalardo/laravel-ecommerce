<?php
/** @var \App\Models\Book $book */
?>
<x-layout-main>
    <x-slot:title>Detalles de {{ $publication->title }}</x-slot:title>

    <section>
        <h1 class="mb-3">{{ $publication->title }}</h1>
        <h2 class="mb-3">{{ $publication->subtitle }}</h2>

        @if($publication->cover !== null && \Storage::exists($publication->cover))
            <img src="{{ \Storage::url($publication->cover)}}" alt="{{ $publication->cover_description }}"/>
        @endif

        <dl class="mb-3">
            <dt>Autor</dt>
            <dd>{{ $publication->author }}</dd>
            <dt>Fecha de publicación</dt>
            <dd>{{ $publication->publication_date->format('d/m/Y') }}</dd>
        </dl>

        <h2 class="mb-3">Contenido</h2>
        <div>{{ $publication->content }}</div>
    </section>
</x-layout-main>
