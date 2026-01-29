@props(['meme'])

<div class="w-full max-w-xl perspective">
    <div x-data="{ flipped: false }" class="relative w-full min-h-[34rem] h-auto"
         :class="flipped ? 'rotate-y-180' : ''"
         @click.away="flipped = false"
         style="transform-style: preserve-3d; transition: transform 0.6s;">

        {{-- FRONT --}}
        <div class="absolute w-full h-full backface-hidden flex flex-col bg-white shadow-lg rounded-lg p-4">

            {{-- Avatar y nombre --}}
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center space-x-3">
                    @if($meme->user)
                        <img src="https://avatars.laravel.cloud/{{ urlencode($meme->user->email) }}"
                             alt="{{ $meme->user->name }}'s avatar" class="w-12 h-12 rounded-full" />
                        <div class="flex flex-col">
                            <span class="font-semibold">{{ $meme->user->name }}</span>
                            <span class="text-sm text-gray-500">{{ $meme->fecha_subida->diffForHumans() }}</span>
                        </div>
                    @else
                        <img src="https://avatars.laravel.cloud/f61123d5-0b27-434c-a4ae-c653c7fc9ed6?vibe=stealth"
                             alt="Anonymous User" class="w-12 h-12 rounded-full" />
                        <div class="flex flex-col">
                            <span class="font-semibold">Anonymous</span>
                            <span class="text-sm text-gray-500">{{ $meme->fecha_subida->diffForHumans() }}</span>
                        </div>
                    @endif
                </div>
                @can('update', $meme)
                    <div class="flex gap-2">
                        <a href="{{ route('memes.edit', $meme) }}" class="text-gray-500 hover:text-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                            </svg>
                        </a>
                        <form method="POST" action="{{ route('memes.destroy', $meme) }}" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-gray-500 hover:text-red-700" onclick="return confirm('¿Estás seguro de eliminar este meme?')">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </form>
                    </div>
                @endcan
            </div>

            {{-- Meme --}}
            <div class="flex-1 flex flex-col items-center justify-center overflow-hidden">
                <img src="{{ $meme->meme_url }}" alt="Meme" class="rounded-lg w-full h-auto max-h-[70vh] object-cover">
            </div>

            {{-- Botón Chirp --}}
            <button @click.stop="flipped = true"
                    class="mt-4 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded shadow mx-auto block">
                Chirp
            </button>

        </div>

        {{-- BACK --}}
        <div class="absolute w-full h-full backface-hidden rotate-y-180 flex flex-col bg-white shadow-lg rounded-lg p-4 justify-between">
            {{-- Explicación centrada --}}
            <div class="flex-1 flex items-center justify-center text-center">
                <p class="text-gray-700 text-lg">{{ $meme->explicacion }}</p>
            </div>

            {{-- Botón Volver abajo --}}
            <div class="flex justify-center">
                <button @click.stop="flipped = false"
                        class="bg-gray-400 hover:bg-gray-500 text-white font-semibold py-2 px-4 rounded shadow">
                    Volver
                </button>
            </div>
        </div>
    </div>
</div>

{{-- Tailwind necesario para 3D --}}
<style>
.perspective {
    perspective: 1000px;
}
.rotate-y-180 {
    transform: rotateY(180deg);
}
.backface-hidden {
    backface-visibility: hidden;
}
</style>

<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
