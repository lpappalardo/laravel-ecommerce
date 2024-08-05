<x-layout-main>
    <x-slot:title>Editar el perfil de "{{ $user->email }}"</x-slot:title>

    <section>
        <h1 class="mb-3">Editar el perfil de "<b>{{ $user->email }}</b>"</h1>

        <form action="{{  route('profile.edit.process', ['id' => $user->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" id="name" name="name" class="form-control" @error('name') aria-describedby="error-name" @enderror value="{{ old('name', $user->name) }}">
                @error('name')
                    <div class="text-danger" id="error-name">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Correo</label>
                <input type="text" id="email" name="email" class="form-control" @error('email') aria-describedby="error-email" @enderror value="{{ old('email', $user->email) }}">
                @error('email')
                    <div class="text-danger" id="error-email">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Editar</button>
        </form>
    </section>
</x-layout-main>
