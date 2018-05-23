@extends('layouts.layout')

@section('content')
    @include('includes.messages')
    {!! Form::open(['action' => ['InfectiousDiseasesController@update', 'patientID' => $patientID, $infectiousDisease->id], 'method' => 'POST']) !!}

    {{ Form::label('diseaseName', 'Назва захворювання') }}<br>
    {{ Form::text('diseaseName', $infectiousDisease->diseaseName) }}<br>

    {{ Form::hidden('_method', 'PUT') }}
    {{ Form::submit('Оновити') }}<br>
    {!! Form::close() !!}
@endsection