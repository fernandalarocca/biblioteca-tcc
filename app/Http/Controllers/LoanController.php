<?php

namespace App\Http\Controllers;

use App\Actions\Book\SubtractionBookQuantityInStock;
use App\Actions\Loan\CreateLoanAction;
use App\Actions\Loan\UpdateLoanAction;
use App\Http\Requests\LoanRequest;
use App\Http\Resources\LoanResource;
use App\Models\Author;
use App\Models\Book;
use App\Models\Loan;

class LoanController extends Controller
{
    public function list()
    {
        $perpage = request()->query('limit', 5);
        $loans = Loan::query()->paginate($perpage);
        $loansResource = LoanResource::collection($loans);
        return view("loan.index", compact("loansResource"));
    }

    public function show(Loan $loan)
    {
        $loan = LoanResource::make($loan);
        return view('loan.show', compact("loan"));
    }

    public function create()
    {
        $booksResource = Book::all();
        $authorsResource = Author::all();
        return view('loan.create', compact('booksResource', 'authorsResource'));
        //return view('loan.create');
    }

    public function store(LoanRequest $request)
    {
        $data = $request->validated();
        $loan = (new CreateLoanAction())->execute($data);

        $book = app(Book::class)->find($loan->book_id);
        (new SubtractionBookQuantityInStock())
            ->execute($book, data_get($data,'quantity', 1));

        return redirect()->route('loans.list');
    }

    public function edit(Loan $loan)
    {
        $booksResource = Book::all();
        $authorsResource = Author::all();
        return view('loan.update', compact('booksResource', 'authorsResource', 'loan'));
        //return view('loan.update', compact("loan"));
    }

    public function update(LoanRequest $request, Loan $loan)
    {
        $data = $request->validated();
        $loan = (new UpdateLoanAction())->execute($data, $loan);
        return redirect()->route('loans.list');
    }

    public function delete(Loan $loan)
    {
        $loan->delete();
        return redirect()->back();
    }
}
