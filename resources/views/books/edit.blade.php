@extends('layouts.books')

@section('title')
    Edycja pozycji
@endsection
@section('buttons')
@endsection
@section('content')
    {!! Form::model($book, ['route' => ['books.update', $book], 'method' => 'PUT']) !!}
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="btn btn-danger">{{ $error }}</div>
        @endforeach
    @endif
    @foreach($authors as $author)
        @php $authors_list[$author->id] = $author->name.' '.$author->surname; @endphp
    @endforeach
    @foreach($countries as $country)
        @php $countries_list[$country->name] = $country->name; @endphp
    @endforeach

    <div class="form-group">
        {!! Form::label('author', "Autor:", ['class'=>'form-inline']) !!}
        {!! Form::select('author', $authors_list, $book->author, ['placeholder' => '','class'=>'form-control']); !!}
    </div>
    <div class="form-group">
        {!! Form::label('title', "Tytuł", ['class'=>'form-inline']) !!}
        {!! Form::text('title', $book->title, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('publication_date', "Data wydania", ['class'=>'form-inline']) !!}
        {!! Form::text('publication_date', $book->publicate_date, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('translation', "Język/Tłumaczenie", ['class'=>'form-inline']) !!}
        {!! Form::select('translation', $countries_list, $book->translation, ['placeholder' => '','class'=>'form-control']); !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Zapisz', ['class'=>'btn btn-danger']) !!}
        {!! link_to_route('books.index', 'Powrót', [], ['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
@endsection
@section('paginator')
@endsection
