@extends('layouts.app')

@section('title', 'Lista Autori')

@section('content')
<div class="bg-white shadow-md rounded-lg">
    <div class="p-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold">Lista degli Autori</h2>
            <a href="{{ route('authors.create') }}" 
               class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z" />
                </svg>
                Nuovo Autore
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
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nome</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Libri</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Biografia</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Azioni</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($authors as $author)
                        <tr>
                            <td class="px-6 py-4">{{ $author->name }}</td>
                            <td class="px-6 py-4">{{ $author->books_count }}</td>
                            <td class="px-6 py-4">{{ Str::limit($author->biography, 100) }}</td>
                            <td class="px-6 py-4 space-x-3">
                                <a href="{{ route('authors.edit', $author->id) }}" 
                                   class="text-indigo-600 hover:text-indigo-900 inline-flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                    </svg>
                                    <span class="ml-1">Modifica</span>
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