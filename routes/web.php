<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [\App\Http\Controllers\AuthController::class, 'showLogin'])->name('login');
Route::post('login', [\App\Http\Controllers\AuthController::class, 'login'])->name('loginPost');

Route::middleware(['auth:sanctum', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('authors', [\App\Http\Controllers\AuthorController::class, 'list'])->name("authors.list");
    Route::get('authors-show/{author}', [\App\Http\Controllers\AuthorController::class, 'show'])->name("authors.show");
    Route::post('authors-store', [\App\Http\Controllers\AuthorController::class, 'store'])->name("authors.store");
    Route::get('authors-create', [\App\Http\Controllers\AuthorController::class, 'create'])->name("authors.create");
    Route::post('authors-update/{author}', [\App\Http\Controllers\AuthorController::class, 'update'])->name("authors.update");
    Route::get('authors/edit/{author}', [\App\Http\Controllers\AuthorController::class, 'edit'])->name("authors.edit");
    Route::post('authors/delete/{author}', [\App\Http\Controllers\AuthorController::class, 'delete'])->name("authors.delete");

    Route::get('books', [\App\Http\Controllers\BookController::class, 'list'])->name("books.list");
    Route::get('books-show/{book}', [\App\Http\Controllers\BookController::class, 'show'])->name("books.show");
    Route::post('books-store', [\App\Http\Controllers\BookController::class, 'store'])->name("books.store");
    Route::get('books-create', [\App\Http\Controllers\BookController::class, 'create'])->name("books.create");
    Route::post('books-update/{book}', [\App\Http\Controllers\BookController::class, 'update'])->name("books.update");
    Route::get('books/edit/{book}', [\App\Http\Controllers\BookController::class, 'edit'])->name("books.edit");
    Route::post('books/delete/{book}', [\App\Http\Controllers\BookController::class, 'delete'])->name("books.delete");

    Route::get('users', [\App\Http\Controllers\UserController::class, 'list'])->name("users.list");
    Route::get('users-show/{user}', [\App\Http\Controllers\UserController::class, 'show'])->name("users.show");
    Route::post('users-store', [\App\Http\Controllers\UserController::class, 'store'])->name("users.store");
    Route::get('users-create', [\App\Http\Controllers\UserController::class, 'create'])->name("users.create");
    Route::post('users-update/{user}', [\App\Http\Controllers\UserController::class, 'update'])->name("users.update");
    Route::get('users/edit/{user}', [\App\Http\Controllers\UserController::class, 'edit'])->name("users.edit");
    Route::post('users/delete/{user}', [\App\Http\Controllers\UserController::class, 'delete'])->name("users.delete");

    Route::get('loans', [\App\Http\Controllers\LoanController::class, 'list'])->name("loans.list");
    Route::get('loans-show/{loan}', [\App\Http\Controllers\LoanController::class, 'show'])->name("loans.show");
    Route::post('loans-store', [\App\Http\Controllers\LoanController::class, 'store'])->name("loans.store");
    Route::get('loans-create', [\App\Http\Controllers\LoanController::class, 'create'])->name("loans.create");
    Route::post('loans-update/{loan}', [\App\Http\Controllers\LoanController::class, 'update'])->name("loans.update");
    Route::get('loans/edit/{loan}', [\App\Http\Controllers\LoanController::class, 'edit'])->name("loans.edit");
    Route::post('loans/delete/{loan}', [\App\Http\Controllers\LoanController::class, 'delete'])->name("loans.delete");

    Route::get('restocks', [\App\Http\Controllers\RestockController::class, 'list'])->name("restocks.list");
    Route::get('restocks-show/{restock}', [\App\Http\Controllers\RestockController::class, 'show'])->name("restocks.show");
    Route::post('restocks-store', [\App\Http\Controllers\RestockController::class, 'store'])->name("restocks.store");
    Route::get('restocks-create', [\App\Http\Controllers\RestockController::class, 'create'])->name("restocks.create");
    Route::post('restocks-update/{restock}', [\App\Http\Controllers\RestockController::class, 'update'])->name("restocks.update");
    Route::get('restocks/edit/{restocks}', [\App\Http\Controllers\RestockController::class, 'edit'])->name("restocks.edit");
    Route::post('restocks/delete/{restock}', [\App\Http\Controllers\RestockController::class, 'delete'])->name("restocks.delete");
});
