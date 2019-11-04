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
    @foreach($authors as $author)
    @php $authors_list[$author->id] = $author->name.' '.$author->surname; @endphp
    @endforeach
    @foreach($countries as $country)
        @php $countries_list[$country->name] = $country->name; @endphp
    @endforeach

    <div class="form-group">
        {!! Form::label('author', "Autor:", ['class'=>'form-inline']) !!}
        {!! Form::select('author', $authors_list, null, ['placeholder' => '','class'=>'form-control']); !!}
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
        {!! Form::label('translation', "Język/Tłumaczenie", ['class'=>'form-inline']) !!}
        {!! Form::select('translation', $countries_list, null, ['placeholder' => '','class'=>'form-control']); !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Zapisz', ['class'=>'btn btn-danger']) !!}
        {!! link_to_route('authors.index', 'Edytuj Autorów', [], ['class'=>'btn btn-primary']) !!}
        {!! link_to_route('books.index', 'Powrót', [], ['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
@endsection
@section('paginator')
@endsection
