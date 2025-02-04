@extends('layouts.app')

@section('title', 'Lista Autori')

@section('content')
<div class="bg-white shadow-md rounded-lg">
    <div class="p-6">
        <h2 class="text-2xl font-bold mb-4">Lista degli Autori</h2>
        
        <div class="overflow-x-auto">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nome</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Biografia</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Libri</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($authors as $author)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $author->name }}</td>
                            <td class="px-6 py-4">{{ Str::limit($author->biography, 100) }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $author->books_count }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection