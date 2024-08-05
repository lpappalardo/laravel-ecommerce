<?php
/** @var \App\Models\Book $book */
?>
<x-layout-main>
    <x-slot:title>Detalles de {{ $book->title }}</x-slot:title>

    <section>
        <h1 class="mb-3">{{ $book->title }}</h1>

        <dl class="mb-3">
            <dt>Autor</dt>
            <dd>{{ $book->author }}</dd>
            <dt>Páginas</dt>
            <dd>{{ $book->pages }}</dd>
            <dt>Precio</dt>
            <dd>${{ $book->price }}</dd>
        </dl>

        <h2 class="mb-3">Descripcion</h2>
        <div>{{ $book->description }}</div>

        <form action="{{ route('products.add.cart', ['id' => $book->id]) }}" method="post" class="ms-2">
            @csrf
            <button type="submit" class="btn button-principal">Añadir al carrito</button>
        </form>
    </section>
</x-layout-main>
