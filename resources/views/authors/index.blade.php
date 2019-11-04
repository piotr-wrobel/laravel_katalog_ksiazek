@extends('layouts.authors')

@section('title')
    Lista Autorów
@endsection

@section('content')
    <table class="table table-hover">
        <tr>
            <th>Imię</th>
            <th>Nazwisko</th>
            <th>Kraj</th>
        </tr>
        @foreach($authors as $author)
            <tr>
                <td>{{ $author->name  }}</td>
                <td>{{ $author->surname  }}</td>
                <td>{{ $author->country  }}</td>
            </tr>
        @endforeach
    </table>
@endsection

@section('paginator')
    {{ $authors->links() }}
@endsection

@section('buttons')
    <a class="btn btn-primary" href="{{route('authors.create')}}">Nowa pozycja</a>
@endsection
