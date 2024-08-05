<{{ 'h' . $headingStart }} class="mb-3">{{ $publication->title }}</{{ 'h' . $headingStart }}>
<{{ 'h' . ($headingStart + 1) }} class="mb-3">{{ $publication->subtitle }}</{{ 'h' . ($headingStart + 1) }}>

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

<{{ 'h' . ($headingStart + 1) }} class="mb-3">Contenido</{{ 'h' . ($headingStart + 1) }}>
<div>{{ $publication->content }}</div>