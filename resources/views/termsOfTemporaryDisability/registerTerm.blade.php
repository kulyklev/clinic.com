@extends('layouts.app')

@section('content')
    @include('includes.messages')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                {!! Form::open(['action' => ['TermsOfTemporaryDisabilityController@store', 'patientID' => $patientID], 'method' => 'POST']) !!}

                <div class="form-group">
                    {{ Form::label('openingDate', 'Дата видачі листка непрацездатності') }}
                    {{ Form::date('openingDate', \Carbon\Carbon::now(), ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('closingDate', 'Дата закриття') }}
                    {{ Form::date('closingDate', \Carbon\Carbon::now(), ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('finalDiagnosis', 'Заключний діагноз') }}
                    {{ Form::text('finalDiagnosis', '', ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('doctor', 'Лікар') }}
                    {{ Form::text('doctor', '', ['class' => 'form-control']) }}
                </div>

                {{ Form::submit('Додати', ['class' => 'btn btn-primary btn-lg']) }}<br>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection