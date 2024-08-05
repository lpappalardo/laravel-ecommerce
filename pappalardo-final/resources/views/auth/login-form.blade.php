<?php
/** @var \App\Models\Book $book */
?>
<x-layout-main>
    <x-slot:title>Iniciar Sesión</x-slot:title>

    <section>
        <h1 class="mb-3">Iniciar Sesión</h1>

        <form action="{{ route('auth.login.process') }}" method="post" class="formulario">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Correo</label>
                <input 
                    type="email"
                    id="email"
                    name="email"
                    class="form-control"
                    @error('email') aria-describedby="error-email" @enderror 
                    value="{{ old('email') }}"
                >
                @error('email')
                    <div class="text-danger" id="error-email">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input 
                    type="password"
                    id="password"
                    name="password"
                    class="form-control"
                    @error('password') aria-describedby="error-password" @enderror 
                    value="{{ old('password') }}"
                >
                @error('password')
                    <div class="text-danger" id="error-password">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Ingresar</button>
        </form>
    </section>
</x-layout-main>
