<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = DB::table('authors')
            ->leftJoin('books', 'authors.id', '=', 'books.author_id')
            ->select([
                'authors.id',
                'authors.name',
                'authors.biography',
                DB::raw('COUNT(books.id) as books_count')
            ])
            ->groupBy('authors.id', 'authors.name', 'authors.biography')
            ->get();

        Log::info('Authors retrieved: ' . $authors->count());
        return view('authors.index', compact('authors'));
    }

    public function create()
    {
        return view('authors.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'biography' => 'nullable|string'
        ]);

        DB::table('authors')->insert([
            'name' => $validated['name'],
            'biography' => $validated['biography'],
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect()->route('authors.index')
            ->with('success', 'Autore aggiunto con successo');
    }
}
