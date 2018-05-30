@extends('layouts.app')

@section('content')
    @include('includes.messages')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                {!! Form::open(['action' => ['EpicrisisAnnualController@store', 'patientID' => $patientID], 'method' => 'POST']) !!}

                <div class="form-group">
                    {{ Form::label('epicrisisDate', 'Дата проведення') }}
                    {{ Form::date('epicrisisDate', \Carbon\Carbon::now(), ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('causeOfObservation', 'Спостерігається з приводу(вказати захворювання)') }}
                    {{ Form::text('causeOfObservation', '', ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('mainDiagnosis', 'Діагноз основний') }}
                    {{ Form::text('mainDiagnosis', '', ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('concomitantDiagnoses', 'Супутні') }}
                    {{ Form::text('concomitantDiagnoses', '', ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('numberOfAggravations', 'Кількість загострень протягом року') }}
                    {{ Form::number('numberOfAggravations', null, ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('carryingOutTreatment', 'Проведення лікування') }}
                    {{ Form::text('carryingOutTreatment', '', ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('disabilityGroup', 'Група інвалідності(рік, дата)') }}
                    {{ Form::text('disabilityGroup', '', ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('sanatoriumAndSpaTreatment', 'Саноторно-курортне лікування') }}
                    {{ Form::text('sanatoriumAndSpaTreatment', '', ['class' => 'form-control']) }}
                </div>

                {{ Form::submit('Додати', ['class' => 'btn btn-primary btn-lg']) }}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
