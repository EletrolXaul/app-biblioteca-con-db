@extends('layouts.app')

@section('title', 'Modifica Libro')

@section('content')
    <div class="bg-white shadow-md rounded-lg">
        <div class="p-6">
            <h2 class="text-2xl font-bold mb-4">Modifica Libro</h2>

            <form method="POST" action="{{ route('books.update', $book->id) }}" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700">Titolo</label>
                    <div class="mt-1 flex rounded-md shadow-sm">
                        <input type="text" name="title" id="title" value="{{ old('title', $book->title) }}"
                            class="flex-1 rounded-md border-gray-300 shadow-sm">
                        <button type="button" onclick="cercaLibro()"
                            class="ml-3 inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                    clip-rule="evenodd" />
                            </svg>
                            Verifica Dati
                        </button>
                    </div>
                    @error('title')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="author_id" class="block text-sm font-medium text-gray-700">Autore</label>
                    <select name="author_id" id="author_id" onchange="cercaLibro()"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        @foreach ($authors as $author)
                            <option value="{{ $author->id }}"
                                {{ old('author_id', $book->author_id) == $author->id ? 'selected' : '' }}>
                                {{ $author->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('author_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="isbn" class="block text-sm font-medium text-gray-700">ISBN</label>
                    <div class="mt-1 flex items-center">
                        <input type="text" name="isbn" id="isbn" value="{{ old('isbn', $book->isbn) }}"
                            class="flex-1 rounded-md border-gray-300 shadow-sm">
                        <span id="isbn_status" class="ml-2"></span>
                    </div>
                    @error('isbn')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="publication_year" class="block text-sm font-medium text-gray-700">
                        Anno di Pubblicazione
                    </label>
                    <div class="mt-1 flex items-center">
                        <input type="number" name="publication_year" id="publication_year"
                            value="{{ old('publication_year', $book->publication_year) }}"
                            class="flex-1 rounded-md border-gray-300 shadow-sm">
                        <span id="year_status" class="ml-2"></span>
                    </div>
                    @error('publication_year')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="pt-4">
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                        Aggiorna Libro
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
