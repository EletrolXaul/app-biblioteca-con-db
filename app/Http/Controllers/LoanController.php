<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function index()
    {
        $loans = Loan::with(['book', 'book.author'])->get();
        return view('loans.index', compact('loans'));
    }
}
