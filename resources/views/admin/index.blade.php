@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('status'))
        <div class="row">
            <div class="col-md-12">
                <div class="alert @if(session('status.class')) {{ session('status.class') }} @else alert-primary @endif" role="alert">
                    <strong>{!! session('status.message') !!}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Авторы</div>
                    <div class="card-body">
                        <p><a href="{{ route('authors.create') }}">Добавить автора</a></p>
                        <hr>
                        @if (!count($authors))
                            <p>Список авторов пуст</p>
                        @else
                            <p>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Имя</th>
                                            <th scope="col">Количество книг</th>
                                            <th scope="col">Действия</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                          @foreach ($authors as $author)
                                            <tr>
                                                <th scope="row">{{ $author->name }}</th>
                                                <td>{{ $author->books->count() }}</td>
                                                <td>
                                                    <div class="btn-group" role="group">
                                                        <a href="{{ route('authors.edit', $author) }}" class="btn btn-primary">Ред.</a>
                                                        <form action="{{ route('authors.destroy', $author) }}" method="POST">
                                                            {{ csrf_field() }}
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Удалить</button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                          @endforeach
                                      </tbody>
                                </table>
                            </p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Книги</div>
                    <div class="card-body">
                        <p><a href="{{ route('books.create') }}">Добавить книгу</a></p>
                        <hr>
                        @if (!count($books))
                            <p>Список книг пуст</p>
                        @else
                            <p>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Книга</th>
                                            <th scope="col">Авторы</th>
                                            <th scope="col">Действия</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                          @foreach ($books as $book)
                                            <tr>
                                                <th scope="row">{{ $book->name }}</th>
                                                <td>
                                                    @if($book->authors->count())
                                                        <ul>
                                                        @foreach ($book->authors as $author)
                                                            <li>{{ $author->name }}</li>
                                                        @endforeach
                                                        </ul>
                                                    @else
                                                        авторы не указаны
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="btn-group" role="group">
                                                        <a href="{{ route('books.edit', $book) }}" class="btn btn-primary">Ред.</a>
                                                        <form action="{{ route('books.destroy', $book) }}" method="POST">
                                                            {{ csrf_field() }}
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Удалить</button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                          @endforeach
                                      </tbody>
                                </table>
                            </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
