@extends('layouts.books')

@section('title')
    Wyniki wyszukiwania
@endsection

@section('content')
    <table class="table table-hover">
        <tr>
            <th>Tytuł</th>
            <th>Autor</th>
            <th>Wydana</th>
            <th>Język/Tłumaczenie</th>
        </tr>
        @foreach($books as $book)
            <tr>
                <td>{{ $book->title  }}</td>
                <td>{{ $book->name  }} {{ $book->surname }}</td>
                <td>{{ $book->publication_date  }}</td>
                <td>{{ $book->translation  }}</td>
            </tr>
        @endforeach
    </table>
@endsection

@section('paginator')
@endsection

@section('buttons')
    <a class="btn btn-primary" href="{{route('books.index')}}">Pokaż wszystkie</a>
    <a class="btn btn-primary" href="{{route('books.search')}}">Szukaj ponownie</a>
@endsection
