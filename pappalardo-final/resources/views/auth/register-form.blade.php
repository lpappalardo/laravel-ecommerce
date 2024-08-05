<?php
/** @var \App\Models\Book $book */
?>
<x-layout-main>
    <x-slot:title>Registrarse</x-slot:title>

    <section>
        <h1 class="mb-3">Registrarse</h1>

        <form action="{{ route('auth.register.process') }}" method="post" class="formulario">
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
            <div class="mb-3">
                <label for="confirm-password" class="form-label">Confirmar contraseña</label>
                <input 
                    type="password"
                    id="confirm-password"
                    name="confirm-password"
                    class="form-control"
                    @error('confirm-password') aria-describedby="error-confirm-password" @enderror 
                    value="{{ old('confirm-password') }}"
                >
                @error('confirm-password')
                    <div class="text-danger" id="error-confirm-password">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Registrarse</button>
        </form>
    </section>
</x-layout-main>
