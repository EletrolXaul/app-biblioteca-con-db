@extends('layouts.app')

@section('title', 'Nuovo Autore')

@section('content')
<div class="bg-white shadow-md rounded-lg">
    <div class="p-6">
        <h2 class="text-2xl font-bold mb-4">Aggiungi Nuovo Autore</h2>

        <form method="POST" action="{{ route('authors.store') }}" class="space-y-4">
            @csrf
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Nome</label>
                <input type="text" 
                       name="name" 
                       id="name" 
                       value="{{ old('name') }}"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="biography" class="block text-sm font-medium text-gray-700">Biografia</label>
                <textarea name="biography" 
                          id="biography"
                          rows="4"
                          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">{{ old('biography') }}</textarea>
                @error('biography')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="pt-4">
                <button type="submit" 
                        class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                    Aggiungi Autore
                </button>
                <a href="{{ route('authors.index') }}" 
                   class="ml-2 bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                    Annulla
                </a>
            </div>
        </form>
    </div>
</div>
@endsection