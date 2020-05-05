@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Новый автор</div>
                    <div class="card-body">
                        <p><a href="{{ route('admin.index') }}">На главную админ-панели</a></p>
                        <hr>
                        <form method="POST" action="{{ route('authors.store') }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="name">Имя</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Имя автора">
                            </div>
                            <div class="form-group">
                                <p><strong>Книги автора:</strong></p>
                                @if($books->count())
                                    <select name="books[]" class="custom-select" multiple>
                                        @foreach ($books as $book)
                                            <option value="{{ $book->id }}">{{ $book->name }}</option>
                                        @endforeach
                                    </select>
                                @else
                                    Нет книг которые можно добавить автору
                                @endif
                            </div>
                            <p><button type="submit" class="btn btn-primary">Добавить</button></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
