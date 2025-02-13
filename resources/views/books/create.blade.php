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
                    <input type="text" 
                           name="title" 
                           id="title" 
                           value="{{ old('title') }}"
                           class="flex-1 rounded-md border-gray-300 shadow-sm"
                           onchange="cercaISBN(this.value)">
                    <button type="button" 
                            onclick="cercaISBN(document.getElementById('title').value)"
                            class="ml-3 inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                        </svg>
                        Cerca ISBN
                    </button>
                </div>
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
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                       readonly>
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

@push('scripts')
<script>
async function cercaISBN(titolo) {
    if (!titolo) return;
    
    try {
        const response = await fetch(`https://www.googleapis.com/books/v1/volumes?q=${encodeURIComponent(titolo)}`);
        const data = await response.json();
        
        if (data.items && data.items[0]?.volumeInfo?.industryIdentifiers) {
            const isbn = data.items[0].volumeInfo.industryIdentifiers.find(
                id => id.type === 'ISBN_13' || id.type === 'ISBN_10'
            );
            
            if (isbn) {
                document.getElementById('isbn').value = isbn.identifier;
            } else {
                alert('ISBN non trovato per questo titolo');
            }
        } else {
            alert('Nessun risultato trovato');
        }
    } catch (error) {
        console.error('Errore durante la ricerca:', error);
        alert('Errore durante la ricerca dell\'ISBN');
    }
}
</script>
@endpush
@endsection