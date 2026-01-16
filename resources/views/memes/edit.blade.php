<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Meme</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md p-6">
            <h1 class="text-2xl font-bold mb-6">Editar Meme</h1>

            <form method="POST" action="{{ route('memes.update', $meme) }}">
                @csrf
                @method('PATCH')

                <div class="mb-4">
                    <label for="meme_url" class="block text-gray-700 text-sm font-bold mb-2">
                        URL del Meme:
                    </label>
                    <input
                        type="url"
                        name="meme_url"
                        id="meme_url"
                        value="{{ old('meme_url', $meme->meme_url) }}"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('meme_url') border-red-500 @enderror"
                        required
                    >
                    @error('meme_url')
                        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="explicacion" class="block text-gray-700 text-sm font-bold mb-2">
                        Explicación:
                    </label>
                    <textarea
                        name="explicacion"
                        id="explicacion"
                        rows="4"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('explicacion') border-red-500 @enderror"
                        required
                    >{{ old('explicacion', $meme->explicacion) }}</textarea>
                    @error('explicacion')
                        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-between">
                    <button
                        type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    >
                        Actualizar
                    </button>
                    <a
                        href="/"
                        class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800"
                    >
                        Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
