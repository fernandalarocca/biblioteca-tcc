<?php

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/public/home');
});

Route::get('/home', function () {
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
    Route::post('/users/{user}/update-password', [\App\Http\Controllers\UserController::class, 'updatePassword'])->name('users.update.password');

    Route::get('loans', [\App\Http\Controllers\LoanController::class, 'list'])->name("loans.list");
    Route::get('loans-show/{loan}', [\App\Http\Controllers\LoanController::class, 'show'])->name("loans.show");
    Route::post('loans-store', [\App\Http\Controllers\LoanController::class, 'store'])->name("loans.store");
    Route::get('loans-create', [\App\Http\Controllers\LoanController::class, 'create'])->name("loans.create");
    Route::post('loans-update/{loan}', [\App\Http\Controllers\LoanController::class, 'update'])->name("loans.update");
    Route::get('loans/edit/{loan}', [\App\Http\Controllers\LoanController::class, 'edit'])->name("loans.edit");
    Route::post('loans/delete/{loan}', [\App\Http\Controllers\LoanController::class, 'delete'])->name("loans.delete");

    Route::get('/logs', [\App\Http\Controllers\LogController::class, 'index'])->name('logs.index');
});

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
