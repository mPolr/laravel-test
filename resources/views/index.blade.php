@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Авторы</div>
                    <div class="card-body">
                        @if (!count($authors))
                            <p>Список авторов пуст</p>
                        @else
                            <p>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Имя</th>
                                            <th scope="col">Количество книг</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                          @foreach ($authors as $author)
                                            <tr>
                                                <th scope="row">{{ $author->name }}</th>
                                                <td>{{ $author->books->count() }}</td>
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
                        @if (!count($books))
                            <p>Список книг пуст</p>
                        @else
                            <p>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Книга</th>
                                            <th scope="col">Авторы</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                          @foreach ($books as $book)
                                            <tr>
                                                <th scope="row">{{ $book->name }}</th>
                                                <td>
                                                    @if($book->authors->count())
                                                        <ul>
                                                        @foreach ($authors as $author)
                                                            <li>{{ $author->name }}</li>
                                                        @endforeach
                                                        </ul>
                                                    @else
                                                        авторы не указаны
                                                    @endif
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
