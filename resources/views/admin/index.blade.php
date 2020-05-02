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
                        <p><a href="{{ route('admin.add_author') }}">Добавить автора</a></p>
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
                        <p><a href="{{ route('admin.add_book') }}">Добавить книгу</a></p>
                        <hr>
                        @if (!count($books))
                            <p>Список книг пуст</p>
                        @else
                            <p></p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
