@extends('layouts.layout')

@section('content')
    @include('includes.messages')
    {!! Form::open(['action' => ['AllergicHistoryController@update', $allergy->id], 'method' => 'POST']) !!}

    {{ Form::label('allergyName', 'Назва алергії') }}<br>
    {{ Form::text('allergyName', $allergy->name) }}<br>

    {{ Form::hidden('_method', 'PUT') }}
    {{ Form::submit('Оновити') }}<br>
    {!! Form::close() !!}
@endsection