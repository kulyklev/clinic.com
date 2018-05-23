@extends('layouts.layout')

@section('content')
    @include('includes.messages')
    {!! Form::open(['action' => ['SurgicalInterventionsController@store', 'patientID' => $patientID], 'method' => 'POST']) !!}

    {{ Form::label('operationName', 'Назва операції') }}<br>
    {{ Form::text('operationName', '') }}<br>

    {{ Form::label('operationDate', 'Дата проведення') }}<br>
    {{ Form::date('operationDate', \Carbon\Carbon::now()) }}<br>

    {{ Form::submit('Добавить') }}<br>
    {!! Form::close() !!}
@endsection