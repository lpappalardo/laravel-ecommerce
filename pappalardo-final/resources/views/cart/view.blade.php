<x-layout-main>
    <x-slot:title>Carrito de compras</x-slot:title>

    <h1 class="mb-3">Carrito de {{ auth()->user()->email }}</h1>

    @if($products->isNotEmpty())
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>
                    @if($product->book->cover !== null && \Storage::exists($product->book->cover))
                        <img src="{{ \Storage::url($product->book->cover)}}" alt="{{ $product->book->cover_description }}" class="mx-auto img-width"/>
                    @endif
                </td>
                <td class="mx-auto">{{ $product->book->title }}</td>
                <td class="mx-auto">${{ $product->book->price }}</td>
                <td class="mx-auto">
                    <form action="{{ route('cart.delete.process', ['id' => $product->id]) }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
            <tr>
                <td colspan="3"><b>TOTAL:</b></td>
                <td><b>${{ auth()->user()->carts->sum('price') }}</b></td>
            </tr>
        </tbody>
    </table>
    <form action="{{ route('cart.clear.process') }}" method="post" class="ms-2">
        @csrf
        <button type="submit" class="btn btn-danger">Vaciar carrito</button>
    </form>
    <div id="mercadopago-button"></div>

    <script src="https://sdk.mercadopago.com/js/v2"></script>
    <script>

        const mp = new MercadoPago('<?= $mpPublicKey;?>');
        mp.bricks().create('wallet', 'mercadopago-button', {
            initialization: {

                preferenceId: '<?= $preference->id;?>'
            },
            customization: {
                texts: {
                    valueProp: 'smart_option',
                },
            },
        });
    </script>
    @else
        <i>No hay productos en el carrito en este momento.</i>
    @endif
</x-layout-main>