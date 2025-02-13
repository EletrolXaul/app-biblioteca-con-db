<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function index()
    {
        $books = DB::table('books')
            ->join('authors', 'books.author_id', '=', 'authors.id')
            ->select([
                'books.id',
                'books.title',
                'books.isbn',
                'books.publication_year',
                'books.is_available',
                'authors.name as author_name'
            ])
            ->get();
            
        return view('books.index', compact('books'));
    }

    public function create()
    {
        $authors = DB::table('authors')
            ->select(['id', 'name'])
            ->orderBy('name')
            ->get();
            
        return view('books.create', compact('authors'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'author_id' => 'required|exists:authors,id',
            'publication_year' => 'required|integer|min:1000|max:' . date('Y'),
            'isbn' => 'required|unique:books,isbn|regex:/^[0-9-]{10,13}$/'
        ]);

        DB::table('books')->insert([
            'title' => $validated['title'],
            'author_id' => $validated['author_id'],
            'publication_year' => $validated['publication_year'],
            'isbn' => $validated['isbn'],
            'is_available' => true,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect()->route('books.index')
            ->with('success', 'Libro aggiunto con successo');
    }

    public function show($id)
    {
        $book = DB::table('books')
            ->join('authors', 'books.author_id', '=', 'authors.id')
            ->select([
                'books.*',
                'authors.name as author_name'
            ])
            ->where('books.id', $id)
            ->first();

        if (!$book) {
            abort(404);
        }

        $loans = DB::table('loans')
            ->where('book_id', $id)
            ->orderBy('loan_date', 'desc')
            ->get();

        return view('books.show', compact('book', 'loans'));
    }

    public function edit($id)
    {
        $book = DB::table('books')
            ->where('id', $id)
            ->first();
            
        if (!$book) {
            abort(404);
        }

        $authors = DB::table('authors')
            ->select(['id', 'name'])
            ->orderBy('name')
            ->get();

        return view('books.edit', compact('book', 'authors'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'author_id' => 'required|exists:authors,id',
            'publication_year' => 'required|integer|min:1000|max:' . date('Y'),
            'isbn' => 'required|regex:/^[0-9-]{10,13}$/|unique:books,isbn,' . $id,
        ]);

        DB::table('books')
            ->where('id', $id)
            ->update([
                'title' => $validated['title'],
                'author_id' => $validated['author_id'],
                'publication_year' => $validated['publication_year'],
                'isbn' => $validated['isbn'],
                'updated_at' => now()
            ]);

        return redirect()->route('books.index')
            ->with('success', 'Libro aggiornato con successo');
    }

    public function destroy($id)
    {
        DB::table('books')->where('id', $id)->delete();
        return redirect()->route('books.index')
            ->with('success', 'Libro eliminato con successo');
    }
}
