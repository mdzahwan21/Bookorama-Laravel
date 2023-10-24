<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view(
        'home',
        ['page_title' => 'Home']
    );
});

Route::get('/about', function () {
    return view(
        'about',
        [
            "page_title" => 'About',
            "name" => "Pria Bibir Pink",
            "project" => "Bookorama"
        ]
    );
});

// Read books
Route::get('/books', [BookController::class, 'index'])->name('books.index');

// Create book
Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
Route::post('/books', [BookController::class, 'store'])->name('books.store');

// Update book
Route::get('/books/{isbn}/edit', [BookController::class, 'edit'])->name('books.edit');
Route::put('/books/{isbn}', [BookController::class, 'update'])->name('books.update');

// Delete book
Route::get('/books/{isbn}/confirm-delete', [BookController::class, 'confirmDelete'])->name('books.confirm-delete');
Route::delete('/books/{isbn}', [BookController::class, 'destroy'])->name('books.destroy');
