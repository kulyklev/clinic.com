@extends('layouts.app')

@section('content')
    @include('includes.messages')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                {!! Form::open(['action' => ['TermsOfTemporaryDisabilityController@update', 'patientID' => $patientID, $termOfTemporaryDisability->id], 'method' => 'POST']) !!}

                <div class="form-group">
                    {{ Form::label('openingDate', 'Дата видачі листка непрацездатності') }}
                    {{ Form::date('openingDate', \Carbon\Carbon::createFromFormat('Y-m-d', $termOfTemporaryDisability->openingDate), ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('closingDate', 'Дата закриття') }}
                    {{ Form::date('closingDate', \Carbon\Carbon::createFromFormat('Y-m-d', $termOfTemporaryDisability->closingDate), ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('finalDiagnosis', 'Заключний діагноз') }}
                    {{ Form::text('finalDiagnosis', $termOfTemporaryDisability->finalDiagnosis, ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('doctor', 'Лікар') }}
                    {{ Form::text('doctor', $termOfTemporaryDisability->doctor, ['class' => 'form-control']) }}
                </div>

                {{ Form::hidden('_method', 'PUT') }}
                {{ Form::submit('Оновити', ['class' => 'btn btn-primary btn-lg']) }}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection