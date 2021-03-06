@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Редактирование автора</div>
                    <div class="card-body">
                        <p><a href="{{ route('admin.index') }}">На главную админ-панели</a></p>
                        <hr>
                        <form method="POST" action="{{ route('authors.update', $author) }}">
                            {{ csrf_field() }}
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Имя</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Имя автора" value="{{ $author->name }}">
                            </div>
                            <div class="form-group">
                                <p><strong>Книги автора:</strong></p>
                                @if($books->count())
                                    <select name="books[]" class="custom-select" multiple>
                                        @foreach ($books as $book)
                                            <option @if($author->books->contains($book)) selected @endif value="{{ $book->id }}">{{ $book->name }}</option>
                                        @endforeach
                                    </select>
                                @else
                                    Нет книг которые можно добавить автору
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary">Обновить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
