@extends('layouts.app')

@section('title', 'Lista Prestiti')

@section('content')
<div class="bg-white shadow-md rounded-lg">
    <div class="p-6">
        <h2 class="text-2xl font-bold mb-4">Lista dei Prestiti</h2>
        
        <div class="overflow-x-auto">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Libro</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Autore</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Prestato a</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Data Prestito</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Data Restituzione</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($loans as $loan)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $loan->book->title }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $loan->book->author->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $loan->borrower_name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $loan->loan_date }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $loan->return_date ?? 'Non restituito' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection