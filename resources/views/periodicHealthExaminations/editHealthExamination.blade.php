@extends('layouts.layout')

@section('content')
    @include('includes.messages')
    {!! Form::open(['action' => ['PeriodicHealthExaminationController@update', 'patientID' => $patientID, 'id' => $periodicHealthExamination->id], 'method' => 'POST']) !!}

    {{ Form::label('nameOfExamination', 'Найменування обстеження') }}<br>
    {{ Form::text('nameOfExamination', $periodicHealthExamination->nameOfExamination) }}<br>

    {{ Form::label('cabinetNumber', 'Номер кабінету') }}<br>
    {{ Form::number('cabinetNumber', $periodicHealthExamination->cabinetNumber) }}<br>

    {{ Form::label('dateOfExamination', 'Дата переливання') }}<br>
    {{ Form::date('dateOfExamination', \Carbon\Carbon::createFromFormat('Y-m-d', $periodicHealthExamination->dateOfExamination)) }}<br>

    {{ Form::hidden('_method', 'PUT') }}
    {{ Form::submit('Оновити') }}<br>
    {!! Form::close() !!}
@endsection