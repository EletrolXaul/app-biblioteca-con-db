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
                <input type="text" 
                       name="title" 
                       id="title" 
                       value="{{ old('title') }}"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                @error('title')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="author_id" class="block text-sm font-medium text-gray-700">Autore</label>
                <select name="author_id" 
                        id="author_id" 
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    <option value="">Seleziona un autore</option>
                    @foreach($authors as $author)
                        <option value="{{ $author->id }}" 
                                {{ old('author_id') == $author->id ? 'selected' : '' }}>
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
                <input type="text" 
                       name="isbn" 
                       id="isbn"
                       value="{{ old('isbn') }}"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                @error('isbn')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="publication_year" class="block text-sm font-medium text-gray-700">
                    Anno di Pubblicazione
                </label>
                <input type="number" 
                       name="publication_year" 
                       id="publication_year"
                       value="{{ old('publication_year') }}"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                @error('publication_year')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="pt-4">
                <button type="submit" 
                        class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
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