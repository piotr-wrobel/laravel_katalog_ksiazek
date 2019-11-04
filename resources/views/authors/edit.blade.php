@extends('layouts.authors')

@section('title')
    Edycja Autora
@endsection
@section('buttons')
@endsection
@section('content')
    {!! Form::model($author, ['route' => ['authors.update', $author], 'method' => 'PUT']) !!}
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="btn btn-danger">{{ $error }}</div>
        @endforeach
    @endif
    @foreach($countries as $country)
        @php $lista[$country->country] = $country->country; @endphp
    @endforeach

    <div class="form-group">
        {!! Form::label('name', "Imię:", ['class'=>'form-inline']) !!}
        {!! Form::text('name', $author->name, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('surname', "Nazwisko:", ['class'=>'form-inline']) !!}
        {!! Form::text('surname', $author->surname, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('country', "Kraj:", ['class'=>'form-inline']) !!}
        {!! Form::select('country', $lista, $author->country, ['placeholder' => '','class'=>'form-control']); !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Zapisz', ['class'=>'btn btn-primary']) !!}
        {!! link_to_route('authors.index', 'Powrót', [], ['class'=>'btn btn-default']) !!}
    </div>
    {!! Form::close() !!}
@endsection
@section('paginator')
@endsection

