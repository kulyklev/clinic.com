@extends('layouts.layout')

@section('content')
    @include('includes.messages')
    {!! Form::open(['action' => ['DrugIntoleranceController@store', 'patientID' => $patientID], 'method' => 'POST']) !!}

    {{ Form::label('drugName', 'Назва лікарського препарату') }}<br>
    {{ Form::text('drugName', '') }}<br>

    {{ Form::submit('Добавить') }}<br>
    {!! Form::close() !!}
@endsection