<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? '8M-Chirper' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <header class="bg-blue-600 text-white p-4">
        <div class="max-w-4xl mx-auto">
            <h1 class="text-2xl font-bold">{{ $title ?? '8M-Chirper' }}</h1>
        </div>
    </header>

    <!-- Success Toast -->
    @if (session('success'))
        <div class="fixed inset-x-0 top-6 flex justify-center z-50">
            <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-2 rounded shadow animate-fade-out">
                {{ session('success') }}
            </div>
        </div>
    @endif

    <main class="py-8">
        {{ $slot }}
    </main>

    <footer class="bg-gray-800 text-white p-4 mt-8">
        <div class="max-w-4xl mx-auto text-center">
            <p>&copy; {{ date('Y') }} 8M-Chirper</p>
        </div>
    </footer>
</body>
</html>
