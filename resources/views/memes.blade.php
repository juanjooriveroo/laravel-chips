<x-layout>
    <x-slot:title>
        Galería de Memes
    </x-slot:title>

    <div class="max-w-4xl mx-auto px-4">
        @forelse ($memes as $meme)
            <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                <div class="mb-4">
                    <img src="{{ $meme->meme_url }}" alt="Meme" class="w-full rounded-lg">
                </div>
                <div>
                    <div class="font-semibold text-blue-600 mb-1">
                        {{ $meme->user->name }}
                    </div>
                    <p class="text-gray-700 mb-2">{{ $meme->explicacion }}</p>
                    <p class="text-sm text-gray-500">
                        Subido {{ $meme->created_at->diffForHumans() }}
                    </p>
                </div>
            </div>
        @empty
            <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-6 text-center">
                <p class="text-gray-600">¡No hay memes todavía! Sé el primero en subir uno.</p>
            </div>
        @endforelse
    </div>
</x-layout>
