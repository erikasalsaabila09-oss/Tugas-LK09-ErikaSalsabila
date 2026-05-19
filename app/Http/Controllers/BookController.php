<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'year' => 'required|integer',
            'category' => 'required',
            'description' => 'required',
        ]);

        $coverName = null;

        if ($request->hasFile('cover')) {
            $file = $request->file('cover');
            $coverName = time().'.'.$file->getClientOriginalExtension();
            $file->storeAs('public/covers', $coverName);
        }

        Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'publisher' => $request->publisher,
            'year' => $request->year,
            'category' => $request->category,
            'description' => $request->description,
            'cover' => $coverName,
        ]);

        return redirect()->route('books.index');
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'year' => 'required|integer',
            'category' => 'required',
            'description' => 'required',
        ]);

        $book = Book::findOrFail($id);

        $coverName = $book->cover;

        if ($request->hasFile('cover')) {
            if ($book->cover) {
                Storage::delete('public/covers/'.$book->cover);
            }

            $file = $request->file('cover');
            $coverName = time().'.'.$file->getClientOriginalExtension();
            $file->storeAs('public/covers', $coverName);
        }

        $book->update([
            'title' => $request->title,
            'author' => $request->author,
            'publisher' => $request->publisher,
            'year' => $request->year,
            'category' => $request->category,
            'description' => $request->description,
            'cover' => $coverName,
        ]);

        return redirect()->route('books.index');
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);

        if ($book->cover) {
            Storage::delete('public/covers/'.$book->cover);
        }

        $book->delete();

        return redirect()->route('books.index');
    }
}