@extends('layouts.app')

@section('content')
    @include('includes.messages')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                {!! Form::open(['action' => ['SurgicalInterventionsController@store', 'patientID' => $patientID], 'method' => 'POST']) !!}

                <div class="form-group">
                    {{ Form::label('operationName', 'Назва операції') }}
                    {{ Form::text('operationName', '', ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('operationDate', 'Дата проведення') }}
                    {{ Form::date('operationDate', \Carbon\Carbon::now(), ['class' => 'form-control']) }}
                </div>

                {{ Form::submit('Додати', ['class' => 'btn btn-primary btn-lg']) }}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
