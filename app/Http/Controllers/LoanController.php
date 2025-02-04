<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use Illuminate\Support\Facades\Log;

class LoanController extends Controller 
{
    public function index()
    {
        $loans = Loan::with(['book', 'book.author'])->get();
        Log::info('Loans retrieved: ' . $loans->count());
        return view('loans.index', compact('loans'));
    }
}
