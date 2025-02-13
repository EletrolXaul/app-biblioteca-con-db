@extends('layouts.app')

@section('title', 'Lista Libri')

@section('content')
<div class="bg-white shadow-md rounded-lg">
    <div class="p-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold">Lista dei Libri</h2>
            <a href="{{ route('books.create') }}" 
               class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                </svg>
                Nuovo Libro
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
        
        <div class="overflow-x-auto">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Titolo</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Autore</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Anno</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Disponibile</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Azioni</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($books as $book)
                        <tr>
                            <td class="px-6 py-4">{{ $book->title }}</td>
                            <td class="px-6 py-4">{{ $book->author_name }}</td>
                            <td class="px-6 py-4">{{ $book->publication_year }}</td>
                            <td class="px-6 py-4">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                    {{ $book->is_available ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $book->is_available ? 'Disponibile' : 'Non disponibile' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 space-x-3">
                                <a href="{{ route('books.show', $book->id) }}" 
                                   class="text-blue-600 hover:text-blue-900 inline-flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                        <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="ml-1">Dettagli</span>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection