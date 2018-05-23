@extends('layouts.layout')

@section('content')
    @include('includes.messages')
    {!! Form::open(['action' => ['EpicrisisAnnualController@update', 'patientID' => $patientID, $epicrisisAnnual->id], 'method' => 'POST']) !!}

    {{ Form::label('epicrisisDate', 'Дата проведення') }}<br>
    {{ Form::date('epicrisisDate', \Carbon\Carbon::createFromFormat('Y-m-d', $epicrisisAnnual->epicrisisDate)) }}<br>

    {{ Form::label('causeOfObservation', 'Спостерігається з приводу(вказати захворювання)' ) }}<br>
    {{ Form::text('causeOfObservation', $epicrisisAnnual->causeOfObservation) }}<br>

    {{ Form::label('mainDiagnosis', 'Діагноз основний') }}<br>
    {{ Form::text('mainDiagnosis', $epicrisisAnnual->mainDiagnosis) }}<br>

    {{ Form::label('concomitantDiagnoses', 'Супутні') }}<br>
    {{ Form::text('concomitantDiagnoses', $epicrisisAnnual->concomitantDiagnoses) }}<br>

    {{ Form::label('numberOfAggravations', 'кількість загострень протягом року') }}<br>
    {{ Form::number('numberOfAggravations', $epicrisisAnnual->numberOfAggravations) }}<br>

    {{ Form::label('carryingOutTreatment', 'Проведення лікування') }}<br>
    {{ Form::text('carryingOutTreatment', $epicrisisAnnual->carryingOutTreatment) }}<br>

    {{ Form::label('disabilityGroup', 'Група інвалідності(рік, дата)') }}<br>
    {{ Form::text('disabilityGroup', $epicrisisAnnual->disabilityGroup) }}<br>

    {{ Form::label('sanatoriumAndSpaTreatment', 'Саноторно-курортне лікування') }}<br>
    {{ Form::text('sanatoriumAndSpaTreatment', $epicrisisAnnual->sanatoriumAndSpaTreatment) }}<br>

    {{ Form::hidden('_method', 'PUT') }}
    {{ Form::submit('Оновити') }}<br>
    {!! Form::close() !!}
@endsection