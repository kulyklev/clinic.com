@extends('layouts.layout')

@section('content')
    @include('includes.messages')
    {!! Form::open(['action' => 'DrugIntoleranceController@store', 'method' => 'POST']) !!}
    {{ Form::label('patient_id', 'patient_id') }}<br>
    {{ Form::text('patient_id', '') }}<br>

    {{ Form::label('drugName', 'Назва лікарського препарату') }}<br>
    {{ Form::text('drugName', '') }}<br>

    {{ Form::submit('Добавить') }}<br>
    {!! Form::close() !!}
@endsection