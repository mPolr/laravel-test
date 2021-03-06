<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('admin.book.create', ['authors' => Author::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $book = new Book;
		$book->name = $request->input('name');
        $book->save();
        if (count($request->authors)) {
            $book->authors()->attach($request->authors);
        }
		return redirect()->route('admin.index')->with('status', [
            'message' => 'Книга успешно добавлена',
            'class' => 'alert-success'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book) {
        return view('admin.book.show', [
            'book' => $book
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book) {
        return view('admin.book.edit', [
            'authors' => Author::all(),
            'book' => $book
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book) {
        $book->name = $request->input('name');
        $book->authors()->sync($request->authors);
		$book->save();
		return redirect()->route('admin.index')->with('status', [
            'message' => 'Данные книги успешно обновлены',
            'class' => 'alert-success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book) {
        $book->authors()->detach();
        $book->delete();
        return redirect()->route('admin.index')->with('status', [
            'message' => "Книга &laquo;{$book->name}&raquo; удалена",
            'class' => 'alert-danger'
        ]);
    }
}
