<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\LoanController;

Route::get('/', function () {
    return view('home');
});

// Rotte per i libri
Route::resource('books', BookController::class);

// Rotte per gli autori
Route::resource('authors', AuthorController::class);

// Rotte per i prestiti
Route::resource('loans', LoanController::class);
