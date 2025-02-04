<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $books = [
            [
                'title' => 'I Promessi Sposi',
                'author_id' => 1,
                'publication_year' => 1840,
                'isbn' => '9788811364011',
                'is_available' => true,
            ],
            // altri libri...
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}
