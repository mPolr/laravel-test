@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Редактирование книги</div>
                    <div class="card-body">
                        <p><a href="{{ route('admin.index') }}">На главную админ-панели</a></p>
                        <hr>
                        <form method="POST" action="{{ route('books.update', $book) }}">
                            {{ csrf_field() }}
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Имя</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Название книги" value="{{ $book->name }}">
                            </div>
                            <div class="form-group">
                                <p><strong>Авторы книги:</strong></p>
                                @if($book->authors)
                                    <select name="authors[]" class="custom-select" multiple>
                                        @foreach ($authors as $author)
                                            <option @if($book->authors->contains($author)) selected @endif value="{{ $author->id }}">{{ $author->name }}</option>
                                        @endforeach
                                    </select>
                                @else
                                    Нет авторов которых можно добавить книге
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
