@extends('layouts.layout')

@section('content')
    @include('includes.messages')
    {!! Form::open(['action' => ['TermsOfTemporaryDisabilityController@update', $termOfTemporaryDisability->id], 'method' => 'POST']) !!}

    {{ Form::label('openingDate', 'Дата видачі листка непрацездатності') }}<br>
    {{ Form::date('openingDate', \Carbon\Carbon::createFromFormat('Y-m-d', $termOfTemporaryDisability->openingDate)) }}<br>

    {{ Form::label('closingDate', 'Дата закриття') }}<br>
    {{ Form::date('closingDate', \Carbon\Carbon::createFromFormat('Y-m-d', $termOfTemporaryDisability->closingDate)) }}<br>

    {{ Form::label('finalDiagnosis', 'Заключний діагноз') }}<br>
    {{ Form::text('finalDiagnosis', $termOfTemporaryDisability->finalDiagnosis) }}<br>

    {{ Form::label('doctor', 'Лікар') }}<br>
    {{ Form::text('doctor', $termOfTemporaryDisability->doctor) }}<br>

    {{ Form::hidden('_method', 'PUT') }}
    {{ Form::submit('Оновити') }}<br>
    {!! Form::close() !!}
@endsection