<!DOCTYPE html>
<html lang="it" class="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca - @yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 dark:bg-gray-900">
    <nav class="bg-white dark:bg-gray-800 shadow-lg">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex justify-between">
                <div class="flex space-x-7">
                    <a href="/" class="flex items-center py-4">
                        <span class="font-semibold text-gray-500 dark:text-gray-300 text-lg">Biblioteca</span>
                    </a>
                    <div class="flex items-center space-x-1">
                        <a href="{{ route('books.index') }}" 
                           class="py-4 px-2 text-gray-500 dark:text-gray-300 hover:text-green-500">Libri</a>
                        <a href="{{ route('authors.index') }}" 
                           class="py-4 px-2 text-gray-500 dark:text-gray-300 hover:text-green-500">Autori</a>
                        <a href="{{ route('loans.index') }}" 
                           class="py-4 px-2 text-gray-500 dark:text-gray-300 hover:text-green-500">Prestiti</a>
                    </div>
                </div>
                <!-- Aggiungi il toggle per la dark mode -->
                <div class="flex items-center">
                    <button id="theme-toggle" class="p-2 rounded-lg text-gray-500 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">
                        <!-- Icona sole per light mode -->
                        <svg id="light-icon" class="w-6 h-6 hidden" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd"/>
                        </svg>
                        <!-- Icona luna per dark mode -->
                        <svg id="dark-icon" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-6xl mx-auto mt-6 px-4">
        @yield('content')
    </main>
    
    <script src="{{ asset('js/book-validation.js') }}"></script>
    <!-- Aggiungi lo script per gestire il theme toggle -->
    <script>
        const themeToggle = document.getElementById('theme-toggle');
        const lightIcon = document.getElementById('light-icon');
        const darkIcon = document.getElementById('dark-icon');
        
        function updateTheme() {
            if (document.documentElement.classList.contains('dark')) {
                lightIcon.classList.remove('hidden');
                darkIcon.classList.add('hidden');
            } else {
                lightIcon.classList.add('hidden');
                darkIcon.classList.remove('hidden');
            }
        }

        // Inizializza il tema dal localStorage
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
        updateTheme();

        themeToggle.addEventListener('click', () => {
            document.documentElement.classList.toggle('dark');
            localStorage.theme = document.documentElement.classList.contains('dark') ? 'dark' : 'light';
            updateTheme();
        });
    </script>
    @stack('scripts')
</body>
</html>