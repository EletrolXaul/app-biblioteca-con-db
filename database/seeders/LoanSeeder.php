<?php

namespace Database\Seeders;

use App\Models\Loan;
use Illuminate\Database\Seeder;

class LoanSeeder extends Seeder
{
    public function run(): void
    {
        $loans = [
            [
                'book_id' => 3,
                'borrower_name' => 'Mario Rossi',
                'loan_date' => '2024-02-01',
                'return_date' => null,
            ],
            [
                'book_id' => 1,
                'borrower_name' => 'Luigi Verdi',
                'loan_date' => '2024-01-15',
                'return_date' => '2024-02-15',
            ],
            [
                'book_id' => 4,
                'borrower_name' => 'Anna Bianchi',
                'loan_date' => '2024-01-20',
                'return_date' => null,
            ],
            [
                'book_id' => 2,
                'borrower_name' => 'Giuseppe Neri',
                'loan_date' => '2024-02-10',
                'return_date' => null,
            ],
            [
                'book_id' => 5,
                'borrower_name' => 'Maria Gialli',
                'loan_date' => '2024-01-05',
                'return_date' => '2024-02-05',
            ]
        ];

        foreach ($loans as $loan) {
            Loan::create($loan);
        }
    }
}
