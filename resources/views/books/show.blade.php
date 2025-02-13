@extends('layouts.app')

@section('title', 'Dettaglio Libro')

@section('content')
<div class="bg-white dark:bg-gray-800 shadow-md rounded-lg">
    <div class="p-6">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">Dettagli del Libro</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <h3 class="text-lg font-semibold mb-2">Informazioni Generali</h3>
                <div class="space-y-2">
                    <p class="text-gray-700 dark:text-gray-300"><span class="font-medium">Titolo:</span> {{ $book->title }}</p>
                    <p class="text-gray-700 dark:text-gray-300"><span class="font-medium">Autore:</span> {{ $book->author_name }}</p>
                    <p class="text-gray-700 dark:text-gray-300"><span class="font-medium">Anno di pubblicazione:</span> {{ $book->publication_year }}</p>
                    <p class="text-gray-700 dark:text-gray-300"><span class="font-medium">ISBN:</span> {{ $book->isbn }}</p>
                    <p class="text-gray-700 dark:text-gray-300">
                        <span class="font-medium">Stato:</span>
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                            {{ $book->is_available ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ $book->is_available ? 'Disponibile' : 'Non disponibile' }}
                        </span>
                    </p>
                </div>
            </div>

            @if($loans->count() > 0)
                <div>
                    <h3 class="text-lg font-semibold mb-2">Storico Prestiti</h3>
                    <div class="space-y-4">
                        @foreach($loans as $loan)
                            <div class="border-l-4 border-green-500 pl-4">
                                <p class="text-gray-700 dark:text-gray-300"><span class="font-medium">Prestato a:</span> {{ $loan->borrower_name }}</p>
                                <p class="text-gray-700 dark:text-gray-300"><span class="font-medium">Data prestito:</span> {{ $loan->loan_date }}</p>
                                <p class="text-gray-700 dark:text-gray-300"><span class="font-medium">Data restituzione:</span> 
                                    {{ $loan->return_date ?? 'Non ancora restituito' }}
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>

    <div class="mt-6">
        <a href="{{ route('books.index') }}" 
           class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
            Torna alla lista
        </a>
    </div>
</div>
@endsection