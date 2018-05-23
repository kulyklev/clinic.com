@extends('layouts.layout')

@section('content')
    @include('includes.messages')
    {!! Form::open(['action' => ['DrugIntoleranceController@update', 'patientID' => $patientID, $drug->id], 'method' => 'POST']) !!}

    {{ Form::label('drugName', 'Назва лікарського препарату') }}<br>
    {{ Form::text('drugName', $drug->drugName) }}<br>


    {{ Form::hidden('_method', 'PUT') }}
    {{ Form::submit('Оновити') }}<br>
    {!! Form::close() !!}
@endsection