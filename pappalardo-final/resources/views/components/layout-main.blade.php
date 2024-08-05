<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $title ?? 'Página Principal' }} :: ECommerce Libros</title>

        <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ url('css/estilos.css') }}">
    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-expand-lg 
             bg-principal">
                <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('home') }}">ECommerce Libros</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <x-link route="home">Home</x-link>
                        </li>
                        @auth
                        @if(auth()->user()->role != 'admin')
                        <li class="nav-item">
                            <x-link route="products.index">Libros</x-link>
                        </li>
                        <li class="nav-item">
                            <x-link route="news.index">Novedades</x-link>
                        </li>

                        <li class="nav-item">
                            <x-link route="cart.view">Carrito {{ auth()->user()->carts->count() }}</x-link>
                        </li>

                        <li class="nav-item">
                            <x-link route="profile.index">Perfil</x-link>
                        </li>

                        @else
                        <li class="nav-item">
                            <x-link route="books.index">Libros</x-link>
                        </li>
                        <li class="nav-item">
                            <x-link route="publications.index">Novedades</x-link>
                        </li>
                        <li class="nav-item">
                            <x-link route="users.index">Usuarios</x-link>
                        </li>
                        @endif
                        @endauth
                        @guest
                        <li class="nav-item">
                            <x-link route="auth.login.form">Iniciar Sesión</x-link>
                        </li>
                        <li class="nav-item">
                            <x-link route="auth.register.form">Registrarse</x-link>
                        </li>
                        @else
                        <li class="nav-item">
                            <form action="{{ route('auth.logout.process') }}" method="post">
                                @csrf
                                <button type="submit" class="btn nav-link"> {{ auth()->user()->email }} (Cerrar Sesión)</button>
                            </form>
                        </li>
                        @endguest
                    </ul>
                </div>
            </nav>
            <main class="container p-4">

                @if(session()->has('feedback.message'))
                <div class="alert alert-{{ session()->get('feedback.type', 'info') }} mb-3">{!! session()->get('feedback.message') !!}</div>
                @endif

                {{ $slot }}
            </main>
            <footer class="footer">
                <p>Copyright &copy; Lautaro Pappalardo 2024</p>
            </footer>
        </div>
        <script src="{{ url('js/bootstrap.bundle.min.js') }}"></script>
    </body>
</html>
