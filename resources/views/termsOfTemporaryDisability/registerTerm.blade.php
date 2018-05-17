@extends('layouts.layout')

@section('content')
    @include('includes.messages')
    {!! Form::open(['action' => 'TermsOfTemporaryDisabilityController@store', 'method' => 'POST']) !!}
    {{ Form::label('patient_id', 'patient_id') }}<br>
    {{ Form::text('patient_id', '') }}<br>

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