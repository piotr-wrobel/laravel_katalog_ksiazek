@extends('layouts.books')

@section('title')
Katalog książek
@endsection

@section('table')
    <table class="table table-hover">
        <tr>
            <th>ID</th>
            <th>Tytuł</th>
            <th>Autor</th>
            <th>Opublikowana</th>
            <th>Język/Tłumaczenie</th>
        </tr>
        @foreach($books as $book)
            <tr>
                <td>{{ $book->id }}</td>
                <td>{{ $book->title  }}</td>
                <td>{{ $book->author  }}</td>
                <td>{{ $book->publication_date  }}</td>
                <td>{{ $book->translation  }}</td>
            </tr>
        @endforeach
    </table>
@endsection
@section('paginator')
    {{ $books->links() }}
@endsection