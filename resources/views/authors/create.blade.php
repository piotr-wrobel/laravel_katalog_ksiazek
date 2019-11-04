@extends('layouts.authors')

@section('title')
    Dodawanie Autora
@endsection
@section('buttons')
@endsection
@section('content')
    {!! Form::open(['route' => 'authors.store']) !!}
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="btn btn-danger">{{ $error }}</div>
        @endforeach
    @endif
    @foreach($countries as $country)
        @php $lista[$country->name] = $country->name; @endphp
    @endforeach

    <div class="form-group">
        {!! Form::label('name', "Imię:", ['class'=>'form-inline']) !!}
        {!! Form::text('name', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('surname', "Nazwisko:", ['class'=>'form-inline']) !!}
        {!! Form::text('surname', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('country', "Kraj:", ['class'=>'form-inline']) !!}
        {!! Form::select('country', $lista, null, ['placeholder' => '','class'=>'form-control']); !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Zapisz', ['class'=>'btn btn-danger']) !!}
        {!! link_to_route('authors.index', 'Powrót', [], ['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
@endsection
@section('paginator')
@endsection
