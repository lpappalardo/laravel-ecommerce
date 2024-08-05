<?php
/** @var \App\Models\Book[]|\Illuminate\Database\Eloquent\Collection $books */
?>
<x-layout-main>
    <x-slot:title>Noticias Disponibles</x-slot:title>

        @if($publications->isNotEmpty())
            <div class="cards">
            @foreach($publications as $publication)
            <div class="card">
                <div class="card-body publication-body">
                    <h3 class="card-body-title">{{ $publication->title }}</h3>
                    <div class="card-body-buttons">
                        <a href="{{ route('news.view', ['id' => $publication->id]) }}" class="btn button-principal">Ver Más</a>
                    </div>
                </div>
            </div>
            @endforeach
            </div>
        @else
        <h2>En este momento no hay novedades disponibles.</h2>
        @endif 
</x-layout-main>
