@extends('layouts.layout')

@section('content')
    @include('includes.messages')
    {!! Form::open(['action' => ['HospitalizationDataController@update', $hospitalizationData->id], 'method' => 'POST']) !!}

    {{ Form::label('hospitalizationDate', 'Дата госпіталізації') }}<br>
    {{ Form::date('hospitalizationDate', \Carbon\Carbon::createFromFormat('Y-m-d', $hospitalizationData->hospitalizationDate)) }}<br>

    {{ Form::label('medicalFacilityName', 'Назва лікувального закладу') }}<br>
    {{ Form::text('medicalFacilityName', $hospitalizationData->medicalFacilityName) }}<br>

    {{ Form::label('departmentName', 'Назва відділення') }}<br>
    {{ Form::text('departmentName', $hospitalizationData->departmentName) }}<br>

    {{ Form::label('finalDiagnosis', 'Заключний діагноз') }}<br>
    {{ Form::text('finalDiagnosis', $hospitalizationData->finalDiagnosis) }}<br>

    {{ Form::hidden('_method', 'PUT') }}
    {{ Form::submit('Оновити') }}<br>
    {!! Form::close() !!}
@endsection