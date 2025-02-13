<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca - @yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <nav class="bg-white shadow-lg">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex justify-between">
                <div class="flex space-x-7">
                    <a href="/" class="flex items-center py-4">
                        <span class="font-semibold text-gray-500 text-lg">Biblioteca</span>
                    </a>
                    <div class="flex items-center space-x-1">
                        <a href="{{ route('books.index') }}" 
                           class="py-4 px-2 text-gray-500 hover:text-green-500">Libri</a>
                        <a href="{{ route('authors.index') }}" 
                           class="py-4 px-2 text-gray-500 hover:text-green-500">Autori</a>
                        <a href="{{ route('loans.index') }}" 
                           class="py-4 px-2 text-gray-500 hover:text-green-500">Prestiti</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-6xl mx-auto mt-6 px-4">
        @yield('content')
    </main>
    
    @stack('scripts')
</body>
</html>