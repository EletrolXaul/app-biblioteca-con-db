@extends('layouts.app')

@section('title', 'Lista Prestiti')

@section('content')
<div class="bg-white dark:bg-gray-800 shadow-md rounded-lg">
    <div class="p-6">
        <h2 class="text-2xl font-bold mb-4 text-gray-900 dark:text-white">Lista dei Prestiti</h2>
        
        <div class="overflow-x-auto">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-50 dark:bg-gray-700">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Libro</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Autore</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Prestato a</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Data Prestito</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Data Restituzione</th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach($loans as $loan)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                            <td class="px-6 py-4 whitespace-nowrap text-gray-900 dark:text-gray-100">{{ $loan->book->title }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-900 dark:text-gray-100">{{ $loan->book->author->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-900 dark:text-gray-100">{{ $loan->borrower_name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-900 dark:text-gray-100">{{ $loan->loan_date }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-900 dark:text-gray-100">{{ $loan->return_date ?? 'Non restituito' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection