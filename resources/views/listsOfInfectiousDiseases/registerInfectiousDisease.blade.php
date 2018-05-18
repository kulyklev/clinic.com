@extends('layouts.layout')

@section('content')
    @include('includes.messages')
    {!! Form::open(['action' => 'ListOfInfectiousDiseasesController@store', 'method' => 'POST']) !!}
    {{ Form::label('patient_id', 'patient_id') }}<br>
    {{ Form::text('patient_id', '') }}<br>

    {{ Form::label('diseaseName', 'Назва захворювання') }}<br>
    {{ Form::text('diseaseName', '') }}<br>

    {{ Form::submit('Добавить') }}<br>
    {!! Form::close() !!}
@endsection