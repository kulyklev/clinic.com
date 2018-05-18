@extends('layouts.layout')

@section('content')
    @include('includes.messages')
    {!! Form::open(['action' => 'ListOfSurgicalInterventionsController@store', 'method' => 'POST']) !!}
    {{ Form::label('patient_id', 'patient_id') }}<br>
    {{ Form::text('patient_id', '') }}<br>

    {{ Form::label('operationName', 'Назва операції') }}<br>
    {{ Form::text('operationName', '') }}<br>

    {{ Form::label('operationDate', 'Дата проведення') }}<br>
    {{ Form::date('operationDate', \Carbon\Carbon::now()) }}<br>

    {{ Form::submit('Добавить') }}<br>
    {!! Form::close() !!}
@endsection