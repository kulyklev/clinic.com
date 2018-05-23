@extends('layouts.layout')

@section('content')
    @include('includes.messages')
    {!! Form::open(['action' => ['InfectiousDiseasesController@store', 'patientID' => $patientID], 'method' => 'POST']) !!}

    {{ Form::label('diseaseName', 'Назва захворювання') }}<br>
    {{ Form::text('diseaseName', '') }}<br>

    {{ Form::submit('Добавить') }}<br>
    {!! Form::close() !!}
@endsection