@extends('layouts.layout')

@section('content')
    @include('includes.messages')
    {!! Form::open(['action' => ['FinalDiagnosisController@store', 'patientID' => $patientID], 'method' => 'POST']) !!}

        {{ Form::label('dateOfTreatment', 'Дата зверення') }}<br>
        {{ Form::date('dateOfTreatment', \Carbon\Carbon::now()) }}<br>

        {{ Form::label('finalDiagnosis', 'Заключні(уточнені) діагнози') }}<br>
        {{ Form::text('finalDiagnosis', '') }}<br>

        {{ Form::label('firstTimeDiagnosed', 'Вперше встановлений діагноз') }}<br>
        {{ Form::label('firstTimeDiagnosed', 'Да') }}
        {{ Form::radio('firstTimeDiagnosed', true) }}
        {{ Form::label('firstTimeDiagnosed', 'Нет') }}
        {{ Form::radio('firstTimeDiagnosed', false) }}<br>

        {{ Form::label('firstTimeDiagnosedOnProphylaxis', 'В т.ч. встановлений вперше при профогляді') }}<br>
        {{ Form::label('firstTimeDiagnosedOnProphylaxis', 'Да') }}
        {{ Form::radio('firstTimeDiagnosedOnProphylaxis', true) }}
        {{ Form::label('firstTimeDiagnosedOnProphylaxis', 'Нет') }}
        {{ Form::radio('firstTimeDiagnosedOnProphylaxis', false) }}<br>

        {{ Form::label('doctor', 'Лікар') }}<br>
        {{ Form::text('doctor', '') }}<br>

        {{ Form::submit('Добавить') }}<br>
    {!! Form::close() !!}
@endsection