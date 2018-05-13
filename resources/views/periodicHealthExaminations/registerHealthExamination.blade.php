@extends('layouts.layout')

@section('content')
    @include('includes.messages')
    {!! Form::open(['action' => 'PeriodicHealthExaminationController@store', 'method' => 'POST']) !!}
    {{ Form::label('patient_id', 'patient_id') }}<br>
    {{ Form::text('patient_id', '') }}<br>

    {{ Form::label('nameOfExamination', 'Найменування обстеження') }}<br>
    {{ Form::text('nameOfExamination', '') }}<br>

    {{ Form::label('cabinetNumber', 'Номер кабінету') }}<br>
    {{ Form::number('cabinetNumber', null) }}<br>

    {{ Form::label('dateOfExamination', 'Дата переливання') }}<br>
    {{ Form::date('dateOfExamination', \Carbon\Carbon::now()) }}<br>

    {{ Form::submit('Добавить') }}<br>
    {!! Form::close() !!}
@endsection