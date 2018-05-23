@extends('layouts.layout')

@section('content')
    @include('includes.messages')
    {!! Form::open(['action' => ['TermsOfTemporaryDisabilityController@store', 'patientID' => $patientID], 'method' => 'POST']) !!}

    {{ Form::label('openingDate', 'Дата видачі листка непрацездатності') }}<br>
    {{ Form::date('openingDate', \Carbon\Carbon::now()) }}<br>

    {{ Form::label('closingDate', 'Дата закриття') }}<br>
    {{ Form::date('closingDate', \Carbon\Carbon::now()) }}<br>

    {{ Form::label('finalDiagnosis', 'Заключний діагноз') }}<br>
    {{ Form::text('finalDiagnosis', '') }}<br>

    {{ Form::label('doctor', 'Лікар') }}<br>
    {{ Form::text('doctor', '') }}<br>

    {{ Form::submit('Добавить') }}<br>
    {!! Form::close() !!}
@endsection