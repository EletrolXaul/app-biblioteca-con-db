@extends('layouts.app')

@section('title', 'Nuovo Libro')

@section('content')
    <div class="bg-white shadow-md rounded-lg">
        <div class="p-6">
            <h2 class="text-2xl font-bold mb-4">Aggiungi Nuovo Libro</h2>

            <form method="POST" action="{{ route('books.store') }}" class="space-y-4">
                @csrf
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700">Titolo</label>
                    <div class="mt-1 flex rounded-md shadow-sm">
                        <input type="text" name="title" id="title" value="{{ old('title') }}"
                            class="flex-1 rounded-md border-gray-300 shadow-sm">
                    </div>
                    @error('title')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="author_id" class="block text-sm font-medium text-gray-700">Autore</label>
                    <div class="mt-1 flex rounded-md shadow-sm">
                        <select name="author_id" id="author_id" class="flex-1 rounded-md border-gray-300 shadow-sm"
                            onchange="cercaLibro()">
                            <option value="">Seleziona un autore</option>
                            @foreach ($authors as $author)
                                <option value="{{ $author->id }}" {{ old('author_id') == $author->id ? 'selected' : '' }}>
                                    {{ $author->name }}
                                </option>
                            @endforeach
                        </select>
                        <button type="button" onclick="cercaLibro()"
                            class="ml-3 inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                    clip-rule="evenodd" />
                            </svg>
                            Cerca Dati
                        </button>
                    </div>
                    @error('author_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="isbn" class="block text-sm font-medium text-gray-700">ISBN</label>
                    <input type="text" name="isbn" id="isbn" value="{{ old('isbn') }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" readonly>
                    @error('isbn')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="publication_year" class="block text-sm font-medium text-gray-700">
                        Anno di Pubblicazione
                    </label>
                    <input type="number" name="publication_year" id="publication_year"
                        value="{{ old('publication_year') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                        readonly>
                    @error('publication_year')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="pt-4">
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                        Aggiungi Libro
                    </button>
                    <a href="{{ route('books.index') }}"
                        class="ml-2 bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                        Annulla
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
