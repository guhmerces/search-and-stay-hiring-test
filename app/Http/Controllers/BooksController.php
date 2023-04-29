<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBookRequest;
use App\Models\Book;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * Display a listing of books.
     */
    public function index()
    {
        return Book::all();
    }

    /**
     * Store a newly created book.
     */
    public function store(CreateBookRequest $request)
    {
        $validatedData = $request->validated();

        Book::create($validatedData);

        return response('', 201);
    }

    /**
     * Display the specified book.
     */
    public function show(string $id)
    {
        $book = Book::findOrFail($id);

        return $book;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
