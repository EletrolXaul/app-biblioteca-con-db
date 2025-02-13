<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca - Home</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    @extends('layouts.app')

    @section('title', 'Home')

    @section('content')
    <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg">
        <div class="p-6">
            <h1 class="text-3xl font-bold mb-4 text-gray-900 dark:text-white">Benvenuti nella Biblioteca</h1>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
                <!-- Card Libri -->
                <div class="bg-gray-50 dark:bg-gray-700 p-6 rounded-lg shadow">
                    <h2 class="text-xl font-semibold mb-2 text-gray-900 dark:text-white">Catalogo Libri</h2>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">Esplora la nostra collezione di libri</p>
                    <a href="{{ route('books.index') }}" 
                       class="inline-block bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 dark:bg-green-600 dark:hover:bg-green-700">
                        Vai al catalogo
                    </a>
                </div>

                <!-- Card Autori -->
                <div class="bg-gray-50 dark:bg-gray-700 p-6 rounded-lg shadow">
                    <h2 class="text-xl font-semibold mb-2 text-gray-900 dark:text-white">Autori</h2>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">Scopri gli autori presenti in biblioteca</p>
                    <a href="{{ route('authors.index') }}" 
                       class="inline-block bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 dark:bg-green-600 dark:hover:bg-green-700">
                        Vedi autori
                    </a>
                </div>

                <!-- Card Prestiti -->
                <div class="bg-gray-50 dark:bg-gray-700 p-6 rounded-lg shadow">
                    <h2 class="text-xl font-semibold mb-2 text-gray-900 dark:text-white">Gestione Prestiti</h2>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">Controlla lo stato dei prestiti</p>
                    <a href="{{ route('loans.index') }}" 
                       class="inline-block bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 dark:bg-green-600 dark:hover:bg-green-700">
                        Vai ai prestiti
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endsection
</body>
</html>