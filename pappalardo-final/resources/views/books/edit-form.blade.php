<?php
/** @var \Illuminate\Support\ViewErrorBag $errors */
/** @var \App\Models\Book $book */
?>
<x-layout-main>
    <x-slot:title>Editar el libro "{{ $book->title }}"</x-slot:title>

    <section>
        <h1 class="mb-3">Editar el libro "<b>{{ $book->title }}</b>"</h1>

        <form action="{{  route('books.edit.process', ['id' => $book->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Título</label>
                <input type="text" id="title" name="title" class="form-control" @error('title') aria-describedby="error-title" @enderror value="{{ old('title', $book->title) }}">
                @error('title')
                    <div class="text-danger" id="error-title">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="author" class="form-label">Autor</label>
                <input type="text" id="author" name="author" class="form-control" @error('author') aria-describedby="error-author" @enderror value="{{ old('author', $book->author) }}">
                @error('author')
                    <div class="text-danger" id="error-author">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="pages" class="form-label">Páginas</label>
                <input type="text" id="pages" name="pages" class="form-control" @error('pages') aria-describedby="error-pages" @enderror value="{{ old('pages', $book->pages) }}">
                @error('pages')
                    <div class="text-danger" id="error-pages">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="format_fk" class="form-label">Formato</label>
                <select id="format_fk" name="format_fk" class="form-control" @error('format_fk') aria-describedby="error-format_fk" @enderror>
                    <option aria-label="Elegí el formaro"></option>
                    @foreach($formats as $format)
                        <option 
                            value="{{ $format->format_id }}"
                            @selected(old('format_fk', $book->format_fk) == $format->format_id )
                        >
                            {{ $format->name }}
                        </option>
                    @endforeach
                </select>
                @error('format_fk')
                    <div class="text-danger" id="error-format_fk">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Precio</label>
                <input type="text" id="price" name="price" class="form-control" @error('price') aria-describedby="error-price" @enderror value="{{ old('price', $book->price) }}">
                @error('price')
                    <div class="text-danger" id="error-price">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <p class="mb-2">Portada actual</p>
                @if ($book->cover !== null && \Storage::exists($book->cover))
                    <img src="{{ \Storage::url($book->cover) }}" alt="">
                @else
                    <p>Sin portada</p>
                @endif
            </div>

            <div class="mb-3">
                <label for="cover" class="form-label">Portada</label>
                <input type="file" id="cover" name="cover" class="form-control" @error('cover') aria-describedby="error-cover" @enderror>
                @error('cover')
                    <div class="text-danger" id="error-cover">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="cover_description" class="form-label">Descripción de la Portada</label>
                <input type="text" id="cover_description" name="cover_description" class="form-control" @error('cover_description') aria-describedby="error-cover_description" @enderror value="{{ old('error-cover_description', $book->cover_description) }}">
                @error('cover_description')
                    <div class="text-danger" id="error-cover_description">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descripción</label>
                <textarea id="description" name="description" class="form-control" @error('description') aria-describedby="error-description" @enderror>{{ old('description', $book->description) }}</textarea>
                @error('description')
                    <div class="text-danger" id="error-description">{{ $message }}</div>
                @enderror
            </div>

            <fieldset class="mb-3">
                <legend>Géneros</legend>

                @foreach($genres as $genre)
                <label class="me-2">
                    <input
                        type="checkbox"
                        name="genre_fk[]"
                        value="{{ $genre->genre_id }}"
                        @checked(in_array($genre->genre_id, old('genre_fk', $book->genres->pluck('genre_id')->all())))
                    >
                    {{ $genre->name }}
                </label>
                @endforeach
            </fieldset>

            <button type="submit" class="btn btn-primary">Editar</button>
        </form>
    </section>
</x-layout-main>
