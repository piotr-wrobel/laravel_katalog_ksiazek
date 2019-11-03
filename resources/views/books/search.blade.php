@extends('layouts.books')

@section('title')
    Szukaj pozycji
@endsection
@section('buttons')
@endsection
@section('content')
    {!! Form::open(['route' => 'books.show']) !!}
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="btn btn-danger">{{ $error }}</div>
        @endforeach
    @endif

    <div class="form-group">
        {!! Form::label('title', "Szukaj po:", ['class'=>'form-inline']) !!}
        {!! Form::select('title', ['T' => 'Tutuł', 'A' => 'Autor', 'D' => 'Data wydania'], 'T', ['class'=>'form-control']); !!}
    </div>

    <div class="form-group">
        {!! Form::label('content', "Fragment:", ['class'=>'form-inline']) !!}
        {!! Form::text('content', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Szukaj', ['class'=>'btn btn-primary']) !!}
        {!! link_to(URL::previous(), 'Powrót', ['class' => 'btn btn-default']) !!}
    </div>
    {!! Form::close() !!}
@endsection
@section('paginator')
@endsection