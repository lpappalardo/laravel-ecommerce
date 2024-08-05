<?php
/** @var \App\Models\Book $book */
?>
<x-layout-main>
    <x-slot:title>Detalles de {{ $publication->title }}</x-slot:title>

    <section>
        <h1 class="mb-3">{{ $publication->title }}</h1>
        <h2 class="mb-3">{{ $publication->subtitle }}</h2>

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
