<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    public function run(): void
    {
        $authors = [
            [
                'name' => 'Alessandro Manzoni',
                'biography' => 'Scrittore, poeta e drammaturgo italiano del XIX secolo',
            ],
            [
                'name' => 'Italo Calvino',
                'biography' => 'Scrittore e partigiano italiano del XX secolo',
            ],
            [
                'name' => 'Umberto Eco',
                'biography' => 'Scrittore, filosofo e semiologo italiano contemporaneo',
            ],
            [
                'name' => 'Primo Levi',
                'biography' => 'Scrittore, partigiano e chimico italiano',
            ],
            [
                'name' => 'Elena Ferrante',
                'biography' => 'Scrittrice italiana contemporanea',
            ]
        ];

        foreach ($authors as $author) {
            Author::create($author);
        }
    }
}
