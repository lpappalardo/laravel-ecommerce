<?php
/** @var \App\Models\Book $book */
?>
<x-layout-main>
    <x-slot:title>Detalles de {{ $book->title }}</x-slot:title>

    <section>
        <h1 class="mb-3">{{ $book->title }}</h1>

@if($book->cover !== null && \Storage::exists($book->cover))
    <img src="{{ \Storage::url($book->cover)}}" alt="{{ $book->cover_description }}"/>
@endif

<dl class="mb-3">
    <dt>Autor</dt>
    <dd>{{ $book->author }}</dd>
    <dt>Páginas</dt>
    <dd>{{ $book->pages }}</dd>
    <dt>Formato</dt>
    <dd>{{ $book->format->name }}</dd>
    <dt>Generos</dt>
    <dd>
        @forelse($book->genres as $genre)
            <div class="badge bg-secondary">{{ $genre->name }}</div>
        @empty
            <i>Sin géneros asignados</i>
        @endforelse
    </dd>
    <dt>Precio</dt>
    <dd>${{ $book->price }}</dd>
</dl>

<h2 class="mb-3">Descripcion</h2>
<div>{{ $book->description }}</div>



        {{-- <h1 class="mb-3">{{ $book->title }}</h1> --}}

        {{-- <dl class="mb-3">
            <dt>Autor</dt>
            <dd>{{ $book->author }}</dd>
            <dt>Páginas</dt>
            <dd>{{ $book->pages }}</dd>
            <dt>Formato</dt>
            <dd>{{ $book->format->name }}</dd>
            <dt>Precio</dt>
            <dd>${{ $book->price }}</dd>
        </dl> --}}

        {{-- <h2 class="mb-3">Descripcion</h2>
        <div>{{ $book->description }}</div> --}}
        {{-- <x-book-data :book="$book"/> --}}
    </section>
</x-layout-main>
