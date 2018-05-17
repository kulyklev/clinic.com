@extends('layouts.layout')

@section('content')
    @include('includes.messages')
    {!! Form::open(['action' => ['AnnualEpicrisisController@update', $vaccinationData->id], 'method' => 'POST']) !!}

    {{ Form::label('epicrisisDate', 'Дата проведення') }}<br>
    {{ Form::date('epicrisisDate', \Carbon\Carbon::createFromFormat('Y-m-d', $vaccinationData->vaccinationDate)) }}<br>

    {{ Form::label('causeOfObservation', 'Спостерігається з приводу(вказати захворювання)' ) }}<br>
    {{ Form::text('causeOfObservation', '') }}<br>

    {{ Form::label('mainDiagnosis', 'Діагноз основний') }}<br>
    {{ Form::text('mainDiagnosis', '') }}<br>

    {{ Form::label('concomitantDiagnoses', 'Супутні') }}<br>
    {{ Form::text('concomitantDiagnoses', '') }}<br>

    {{ Form::label('numberOfAggravations', 'кількість загострень протягом року') }}<br>
    {{ Form::number('numberOfAggravations', null) }}<br>

    {{ Form::label('carryingOutTreatment', 'Проведення лікування') }}<br>
    {{ Form::text('carryingOutTreatment', '') }}<br>

    {{ Form::label('disabilityGroup', 'Група інвалідності(рік, дата)') }}<br>
    {{ Form::text('disabilityGroup', '') }}<br>

    {{ Form::label('sanatoriumAndSpaTreatment', 'Саноторно-курортне лікування') }}<br>
    {{ Form::text('sanatoriumAndSpaTreatment', '') }}<br>

    {{ Form::hidden('_method', 'PUT') }}
    {{ Form::submit('Оновити') }}<br>
    {!! Form::close() !!}
@endsection