<?php
/** @var \Illuminate\Support\ViewErrorBag $errors */
?>
<x-layout-main>
    <x-slot:title>Agregar una Novedad</x-slot:title>

    <section>
        <h1 class="mb-3">Agregar una Novedad</h1>

        <form action="{{  route('publications.create.process') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Título</label>
                <input type="text" id="title" name="title" class="form-control" @error('title') aria-describedby="error-title" @enderror value="{{ old('title') }}">
                @error('title')
                    <div class="text-danger" id="error-title">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="subtitle" class="form-label">Subtítulo</label>
                <input type="text" id="subtitle" name="subtitle" class="form-control" @error('subtitle') aria-describedby="error-subtitle" @enderror value="{{ old('subtitle') }}">
                @error('subtitle')
                    <div class="text-danger" id="error-subtitle">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="author" class="form-label">Autor</label>
                <input type="text" id="author" name="author" class="form-control" @error('author') aria-describedby="error-author" @enderror value="{{ old('author') }}">
                @error('author')
                    <div class="text-danger" id="error-author">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="publication_date" class="form-label">Fecha de publicación</label>
                <input type="date" id="publication_date" name="publication_date" class="form-control" @error('publication_date') aria-describedby="error-publication_date" @enderror value="{{ old('publication_date') }}">
                @error('publication_date')
                    <div class="text-danger" id="error-publication_date">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Contenido</label>
                <textarea id="content" name="content" class="form-control">{{ old('content') }}</textarea>
            </div>

            <fieldset class="mb-3">
                <legend>Categorías</legend>

                @foreach($categories as $category)
                <label class="me-2">
                    <input
                        type="checkbox"
                        name="category_fk[]"
                        value="{{ $category->category_id }}"
                        @checked(in_array($category->category_id, old('category_fk', [])))
                    >
                    {{ $category->name }}
                </label>
                @endforeach
            </fieldset>

            <div class="mb-3">
                <label for="cover" class="form-label">Portada</label>
                <input type="file" id="cover" name="cover" class="form-control" @error('cover') aria-describedby="error-cover" @enderror>
                @error('cover')
                    <div class="text-danger" id="error-cover">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="cover_description" class="form-label">Descripción de la Portada</label>
                <input type="text" id="cover_description" name="cover_description" class="form-control" @error('cover_description') aria-describedby="error-cover_description" @enderror value="{{ old('error-cover_description') }}">
                @error('cover_description')
                    <div class="text-danger" id="error-cover_description">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Agregar</button>
        </form>
    </section>
</x-layout-main>
