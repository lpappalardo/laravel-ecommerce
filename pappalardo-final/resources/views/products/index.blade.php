<?php
/** @var \App\Models\Book[]|\Illuminate\Database\Eloquent\Collection $books */
?>
<x-layout-main>
    <x-slot:title>Productos Disponibles</x-slot:title>

        @if($books->isNotEmpty())
            <div class="cards">
            @foreach($books as $book)
            <div class="card">
                <div class="card-img centrar">
                    @if($book->cover !== null && \Storage::exists($book->cover))
                        <img src="{{ \Storage::url($book->cover)}}" alt="{{ $book->cover_description }}"/>
                    @else
                        <img src="{{ url('img/products/theWayOfKings.png') }}" alt="{{ $book->title }}">
                    @endif
                </div>
                <div class="card-body">
                    <h3 class="card-body-title">{{ $book->title }}</h3>
                    <p class="card-body-price">${{ $book->price }}</p>
                    <div class="card-body-buttons d-flex">
                        <a href="{{ route('products.view', ['id' => $book->id]) }}" class="btn button-principal">Ver Más</a>

                        <form action="{{ route('products.add.cart', ['id' => $book->id]) }}" method="post" class="ms-2">
                            @csrf
                            <button type="submit" class="btn button-principal">Añadir al carrito</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
            </div>
        @else
        <h2>En este momento no hay libros disponibles.</h2>
        @endif 
</x-layout-main>
