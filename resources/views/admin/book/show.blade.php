@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ $book->name }}</div>
                    <div class="card-body">
                        <p><a href="{{ route('admin.index') }}">На главную админ-панели</a></p>
                        <hr>
                        @if($book->authors()->count())
                            <ul>
                            @foreach ($book->authors as $author)
                                <li>{{ $author->name }}</li>
                            @endforeach
                            </ul>
                        @else
                            Нет авторов
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
