@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ $author->name }}</div>
                    <div class="card-body">
                        <p><a href="{{ route('admin.index') }}">На главную админ-панели</a></p>
                        <hr>
                        @if($author->books)
                            <ul>
                            @foreach ($author->books as $book)
                                <li>{{ $book->name }}</li>
                            @endforeach
                            </ul>
                        @else
                            Нет книг
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
