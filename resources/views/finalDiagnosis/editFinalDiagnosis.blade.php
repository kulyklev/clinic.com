@extends('layouts.layout')

@section('content')
    @include('includes.messages')
    {!! Form::open(['action' => ['FinalDiagnosisController@update', $finalDiagnosis->id], 'method' => 'POST']) !!}
    {{ Form::label('dateOfTreatment', 'Дата зверення') }}<br>
    {{ Form::date('dateOfTreatment', \Carbon\Carbon::createFromFormat('Y-m-d', $finalDiagnosis->dateOfTreatment)) }}<br>

    {{ Form::label('finalDiagnosis', 'Заключні(уточнені) діагнози') }}<br>
    {{ Form::text('finalDiagnosis', $finalDiagnosis->finalDiagnosis) }}<br>

    @if($finalDiagnosis->firstTimeDiagnosed == false)
        {{ Form::label('firstTimeDiagnosed', 'Вперше встановлений діагноз') }}<br>
        {{ Form::label('firstTimeDiagnosed', 'Да') }}
        {{ Form::radio('firstTimeDiagnosed', true) }}
        {{ Form::label('firstTimeDiagnosed', 'Нет') }}
        {{ Form::radio('firstTimeDiagnosed', false, true) }}<br>
    @else
        {{ Form::label('firstTimeDiagnosed', 'Вперше встановлений діагноз') }}<br>
        {{ Form::label('firstTimeDiagnosed', 'Да') }}
        {{ Form::radio('firstTimeDiagnosed', true, true) }}
        {{ Form::label('firstTimeDiagnosed', 'Нет') }}
        {{ Form::radio('firstTimeDiagnosed', false) }}<br>
    @endif

    @if($finalDiagnosis->firstTimeDiagnosedOnProphylaxis == false)
        {{ Form::label('firstTimeDiagnosedOnProphylaxis', 'В т.ч. встановлений вперше при профогляді') }}<br>
        {{ Form::label('firstTimeDiagnosedOnProphylaxis', 'Да') }}
        {{ Form::radio('firstTimeDiagnosedOnProphylaxis', true) }}
        {{ Form::label('firstTimeDiagnosedOnProphylaxis', 'Нет') }}
        {{ Form::radio('firstTimeDiagnosedOnProphylaxis', false, true) }}<br>
    @else
        {{ Form::label('firstTimeDiagnosedOnProphylaxis', 'В т.ч. встановлений вперше при профогляді') }}<br>
        {{ Form::label('firstTimeDiagnosedOnProphylaxis', 'Да') }}
        {{ Form::radio('firstTimeDiagnosedOnProphylaxis', true, true) }}
        {{ Form::label('firstTimeDiagnosedOnProphylaxis', 'Нет') }}
        {{ Form::radio('firstTimeDiagnosedOnProphylaxis', false) }}<br>
    @endif

    {{ Form::label('doctor', 'Лікар') }}<br>
    {{ Form::text('doctor', $finalDiagnosis->doctor) }}<br>

    {{ Form::hidden('_method', 'PUT') }}
    {{ Form::submit('Оновити') }}<br>
    {!! Form::close() !!}
@endsection