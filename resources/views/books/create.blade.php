@extends('layouts.books')

@section('title')
    Dodawanie pozycji
@endsection
@section('buttons')
  @endsection
@section('content')
    {!! Form::open(['route' => 'books.store']) !!}
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="btn btn-danger">{{ $error }}</div>
        @endforeach
    @endif

    <div class="form-group">
        {!! Form::label('author', "Autor:", ['class'=>'form-inline']) !!}
        {!! Form::select('author', ['1' => 'Author 1', '2' => 'Author 2', '3' => 'Author 3'], null, ['placeholder' => '','class'=>'form-control']); !!}
    </div>
    <div class="form-group">
        {!! Form::label('title', "Tytuł", ['class'=>'form-inline']) !!}
        {!! Form::text('title', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('publication_date', "Data wydania", ['class'=>'form-inline']) !!}
        {!! Form::text('publication_date', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('country', "Język/Tłumaczenie", ['class'=>'form-inline']) !!}
        {!! Form::select('country', ['1' => 'Poland', '2' => 'Panama', '3' => 'Austria'], null, ['placeholder' => '','class'=>'form-control']); !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Zapisz', ['class'=>'btn btn-primary']) !!}
        {!! link_to_route('books.createAuthor', 'Nowy Autor', [], ['class'=>'btn btn-primary']) !!}
        {!! link_to(URL::previous(), 'Powrót', ['class' => 'btn btn-default']) !!}
    </div>
    {!! Form::close() !!}
@endsection
@section('paginator')
@endsection
