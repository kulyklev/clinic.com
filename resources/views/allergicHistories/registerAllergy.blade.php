@extends('layouts.layout')

@section('content')
    @include('includes.messages')
    {!! Form::open(['action' => ['AllergicHistoryController@store', 'patientID' => $patientID], 'method' => 'POST']) !!}

    {{ Form::label('allergyName', 'Назва алергії') }}<br>
    {{ Form::text('allergyName', '') }}<br>

    {{ Form::submit('Добавить') }}<br>
    {!! Form::close() !!}
@endsection