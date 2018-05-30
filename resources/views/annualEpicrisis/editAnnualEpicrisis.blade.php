@extends('layouts.app')

@section('content')
    @include('includes.messages')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                {!! Form::open(['action' => ['EpicrisisAnnualController@update', 'patientID' => $patientID, $epicrisisAnnual->id], 'method' => 'POST']) !!}

                <div class="form-group">
                    {{ Form::label('epicrisisDate', 'Дата проведення') }}
                    {{ Form::date('epicrisisDate', \Carbon\Carbon::createFromFormat('Y-m-d', $epicrisisAnnual->epicrisisDate), ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('causeOfObservation', 'Спостерігається з приводу(вказати захворювання)') }}
                    {{ Form::text('causeOfObservation', $epicrisisAnnual->causeOfObservation, ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('mainDiagnosis', 'Діагноз основний') }}
                    {{ Form::text('mainDiagnosis', $epicrisisAnnual->mainDiagnosis, ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('concomitantDiagnoses', 'Супутні') }}
                    {{ Form::text('concomitantDiagnoses', $epicrisisAnnual->concomitantDiagnoses, ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('numberOfAggravations', 'Кількість загострень протягом року') }}
                    {{ Form::number('numberOfAggravations', $epicrisisAnnual->numberOfAggravations, ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('carryingOutTreatment', 'Проведення лікування') }}
                    {{ Form::text('carryingOutTreatment', $epicrisisAnnual->carryingOutTreatment, ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('disabilityGroup', 'Група інвалідності(рік, дата)') }}
                    {{ Form::text('disabilityGroup', $epicrisisAnnual->disabilityGroup, ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('sanatoriumAndSpaTreatment', 'Саноторно-курортне лікування') }}
                    {{ Form::text('sanatoriumAndSpaTreatment', $epicrisisAnnual->sanatoriumAndSpaTreatment, ['class' => 'form-control']) }}
                </div>

                {{ Form::hidden('_method', 'PUT') }}
                {{ Form::submit('Оновити', ['class' => 'btn btn-primary btn-lg']) }}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
