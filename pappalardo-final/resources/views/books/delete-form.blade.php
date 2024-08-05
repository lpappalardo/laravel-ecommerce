<?php
/** @var \App\Models\Book $book */
?>
<x-layout-main>
    <x-slot:title>Confirmación necesaria para eliminar el libro {{ $book->title }}</x-slot:title>

    <h1>Confirmación Necesaria</h1>

    <p>Estas por eliminar el siguiente libro, y se necesita Confirmar la acción.</p>

    <hr>

    <section>
        {{-- <h2 class="mb-3">{{ $book->title }}</h2> --}}

        {{-- <dl class="mb-3">
            <dt>Autor</dt>
            <dd>{{ $book->author }}</dd>
            <dt>Páginas</dt>
            <dd>{{ $book->pages }}</dd>
            <dt>Precio</dt>
            <dd>${{ $book->price }}</dd>
        </dl> --}}
        <x-book-data 
            :book="$book"
            headingStart="2"    
        />

        {{-- <h3 class="mb-3">Descripcion</h3>
        <div>{{ $book->description }}</div> --}}
    </section>

    <hr>

    <form action="{{ route('books.delete.process', ['id' => $book->id]) }}" method="post" class="ms-2">
        @csrf
        <button type="submit" class="btn btn-danger">Confirmar Eliminación</button>
    </form>

</x-layout-main>