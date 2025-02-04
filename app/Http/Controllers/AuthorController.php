<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Support\Facades\Log;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::withCount('books')->get();
        Log::info('Authors retrieved: ' . $authors->count());
        return view('authors.index', compact('authors'));
    }
}
