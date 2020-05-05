<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use Illuminate\Http\Request;

class AuthorController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('admin.author.create', ['books' => Book::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
		$author = new Author;
        $author->name = $request->input('name');
        $author->save();
        if (count($request->books)) {
            $author->books()->attach($request->books);
        }
		return redirect()->route('admin.index')->with('status', [
            'message' => 'Автор успешно добавлен',
            'class' => 'alert-success'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author) {
        return view('admin.author.show', [
            'author' => $author
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author) {
        return view('admin.author.edit', [
            'author' => $author,
            'books' => Book::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Author $author) {
        $author->name = $request->input('name');
        $author->books()->sync($request->books);
		$author->save();
		return redirect()->route('admin.index')->with('status', [
            'message' => 'Данные автора успешно обновлены',
            'class' => 'alert-success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author) {
        $author->books()->detach();
        $author->delete();
        return redirect()->route('admin.index')->with('status', [
            'message' => "Автор &laquo;{$author->name}&raquo; удален",
            'class' => 'alert-danger'
        ]);
    }
}
