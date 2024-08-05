<x-layout-main>
    <x-slot:title>Detalles de {{ $user->email }}</x-slot:title>

    <section>
        <h1 class="mb-3">Perfil de {{ $user->email }}</h1>
        
        <dl class="mb-3">

            @if ($user->name !== null)
                <dt>Nombre</dt>
                <dd>{{ $user->name }}</dd>
            @endif

            <dt>Correo</dt>
            <dd>{{ $user->email }}</dd>
        </dl>

        <a href="{{ route('profile.edit.form', ['id' => $user->id]) }}" class="mb-4 btn btn-primary">Editar perfil</a>
        
        
        <h2 class="mb-3">Ordenes de compra realizadas</h2>

        @if($user->ordenes->isNotEmpty())
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Título</th>
                <th>Precio</th>
                <th>Formato</th>
                <th>Generos</th>
                <th>Fecha</th>
            </tr>
            </thead>
            <tbody>
    
            @forelse($products as $product)
            <tr>
                <td>{{ $product->book->title }}</td>
                <td>${{ $product->book->price }}</td>
                <td>{{ $product->book->format->name }}</td>
                <td>
                    @forelse($product->book->genres as $genre)
                        <div class="badge bg-secondary">{{ $genre->name }}</div>
                    @empty
                        <i>Sin géneros asignados</i>
                        
                    @endforelse
                </td>
                <td>{{ $product->order_date }}</td>
            </tr>
            @empty
                <i>No se ha odernado ninguna compra todavía</i>
            @endforelse
    
            </tbody>
        </table>
        @else
            <i>No se ha odernado ninguna compra todavía</i>
        @endif
    </section>
</x-layout-main>
