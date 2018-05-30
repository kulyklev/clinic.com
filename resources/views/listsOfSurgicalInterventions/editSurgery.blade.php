@extends('layouts.app')

@section('content')
    @include('includes.messages')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                {!! Form::open(['action' => ['SurgicalInterventionsController@update', 'patientID' => $patientID, $surgery->id], 'method' => 'POST']) !!}

                <div class="form-group">
                    {{ Form::label('operationName', 'Назва операції') }}
                    {{ Form::text('operationName', $surgery->operationName, ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('operationDate', 'Дата проведення') }}
                    {{ Form::date('operationDate', \Carbon\Carbon::createFromFormat('Y-m-d', $surgery->operationDate), ['class' => 'form-control']) }}
                </div>

                {{ Form::hidden('_method', 'PUT') }}
                {{ Form::submit('Оновити', ['class' => 'btn btn-primary btn-lg']) }}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection