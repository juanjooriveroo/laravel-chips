<x-layout>
    <x-slot:title>
        Home Feed
    </x-slot:title>

    <div class="max-w-4xl mx-auto px-4">
        <h1 class="text-3xl font-bold mt-8">Últimos Memes</h1>

        <!-- Formulario simple para subir meme -->
        <div class="card bg-white shadow mt-6 w-full max-w-2xl">
            <div class="card-body p-4">
                <form method="POST" action="/memes">
                    @csrf

                    <div class="mb-3">
                        <label class="block text-sm font-medium text-gray-700">URL del meme</label>
                        <input type="url" name="meme_url" value="{{ old('meme_url') }}" required maxlength="255"
                            class="mt-1 block w-full rounded border-gray-300 shadow-sm">
                        @error('meme_url')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="block text-sm font-medium text-gray-700">Explicación</label>
                        <textarea name="explicacion" rows="3" required maxlength="255"
                            class="mt-1 block w-full rounded border-gray-300 shadow-sm">{{ old('explicacion') }}</textarea>
                        @error('explicacion')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="text-right">
                        <button type="submit" class="inline-flex items-center px-3 py-1.5 bg-blue-600 text-white rounded">Subir</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="space-y-8 mt-8 flex flex-col items-center">
            @forelse ($memes as $meme)
                <x-meme :meme="$meme" />
            @empty
                <div class="hero py-12">
                    <div class="hero-content text-center">
                        <div>
                            <svg class="mx-auto h-12 w-12 opacity-30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                                </path>
                            </svg>
                            <p class="mt-4 text-base-content/60">¡No hay memes todavía! Sé el primero en subir uno.</p>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</x-layout>
