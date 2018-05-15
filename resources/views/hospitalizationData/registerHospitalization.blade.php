@extends('layouts.layout')

@section('content')
    @include('includes.messages')
    {!! Form::open(['action' => 'HospitalizationDataController@store', 'method' => 'POST']) !!}
    {{ Form::label('patient_id', 'patient_id') }}<br>
    {{ Form::text('patient_id', '') }}<br>

    {{ Form::label('hospitalizationDate', 'Дата госпіталізації') }}<br>
    {{ Form::date('hospitalizationDate', \Carbon\Carbon::now()) }}<br>

    {{ Form::label('medicalFacilityName', 'Назва лікувального закладу') }}<br>
    {{ Form::text('medicalFacilityName', '') }}<br>

    {{ Form::label('departmentName', 'Назва відділення') }}<br>
    {{ Form::text('departmentName', '') }}<br>

    {{ Form::label('finalDiagnosis', 'Заключний діагноз') }}<br>
    {{ Form::text('finalDiagnosis', '') }}<br>

    {{ Form::submit('Добавить') }}<br>
    {!! Form::close() !!}
@endsection