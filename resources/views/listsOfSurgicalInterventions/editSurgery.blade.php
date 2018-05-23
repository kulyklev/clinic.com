@extends('layouts.layout')

@section('content')
    @include('includes.messages')
    {!! Form::open(['action' => ['SurgicalInterventionsController@update', 'patientID' => $patientID, $surgery->id], 'method' => 'POST']) !!}

    {{ Form::label('operationName', 'Назва операції') }}<br>
    {{ Form::text('operationName', $surgery->operationName) }}<br>

    {{ Form::label('operationDate', 'Дата проведення') }}<br>
    {{ Form::date('operationDate', \Carbon\Carbon::createFromFormat('Y-m-d', $surgery->operationDate)) }}<br>

    {{ Form::hidden('_method', 'PUT') }}
    {{ Form::submit('Оновити') }}<br>
    {!! Form::close() !!}
@endsection