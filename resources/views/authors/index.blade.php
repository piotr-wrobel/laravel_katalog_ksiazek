@extends('layouts.authors')

@section('messages')
    @if (session('warning'))
        <div class="alert alert-warning">
            {{ session('warning') }}
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
@endsection
@section('title')
    Lista Autorów
@endsection

@section('content')
    <table class="table table-hover">
        <tr>
            <th>Imię</th>
            <th>Nazwisko</th>
            <th>Kraj</th>
            <th/><th/>
        </tr>
        @foreach($authors as $author)
            <tr>
                <td>{{ $author->name  }}</td>
                <td>{{ $author->surname  }}</td>
                <td>{{ $author->country  }}</td>
                <td><a class="btn btn-info" href="{{route('authors.edit', $author)}}">Edytuj</a></td>
                <td>
                    {!! Form::model($author, ['route' => ['authors.delete', $author], 'method' => 'DELETE']) !!}
                        <button class="btn btn-danger">Usuń</button>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </table>
@endsection

@section('paginator')
    {{ $authors->links() }}
@endsection

@section('buttons')
    <a class="btn btn-primary" href="{{route('authors.create')}}">Nowa pozycja</a>
    <a class="btn btn-primary" href="{{route('books.create')}}">Powrót</a>
    <a class="btn btn-primary" href="{{route('books.index')}}">Lista pozycji</a>
@endsection
