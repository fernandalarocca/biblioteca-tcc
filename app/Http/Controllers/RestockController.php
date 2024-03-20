<?php

namespace App\Http\Controllers;

use App\Actions\Book\AdditionBookQuantityInStock;
use App\Actions\Restock\CreateRestockAction;
use App\Actions\Restock\UpdateRestockAction;
use App\Http\Requests\RestockRequest;
use App\Http\Resources\RestockResource;
use App\Models\Book;
use App\Models\Restock;

class RestockController extends Controller
{
    public function list()
    {
        $perpage = request()->query('limit', 5);
        $restocks = Restock::query()->paginate($perpage);
        $restocksResource = RestockResource::collection($restocks);
        return view("restock.index", compact("restocksResource"));
    }

    public function show(Restock $restock)
    {
        $restock = RestockResource::make($restock);
        return view('restock.show', compact("restock"));
    }

    public function create()
    {
        return view('restock.create');
    }

    public function store(RestockRequest $request)
    {
        $data = $request->validated();
        $restock = (new CreateRestockAction())->execute($data);

        $book = app(Book::class)->find($restock->book_id);
        (new AdditionBookQuantityInStock())
            ->execute($book, data_get($data,'quantity', 1));

        return redirect()->route('restocks.list');
    }

    public function edit(Restock $restock)
    {
        return view('restock.update', compact("restock"));
    }

    public function update(RestockRequest $request, Restock $restock)
    {
        $data = $request->validated();
        $restock = (new UpdateRestockAction())->execute($data, $restock);
        return redirect()->route('restocks.list');
    }

    public function delete(Restock $restock)
    {
        $restock->delete();
        return redirect()->back();
    }
}
