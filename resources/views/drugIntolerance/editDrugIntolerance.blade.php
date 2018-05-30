@extends('layouts.app')

@section('content')
    @include('includes.messages')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                {!! Form::open(['action' => ['DrugIntoleranceController@update', 'patientID' => $patientID, $drug->id], 'method' => 'POST']) !!}

                <div class="form-group">
                    {{ Form::label('drugName', 'Назва лікарського препарату') }}
                    {{ Form::text('drugName', $drug->drugName, ['class' => 'form-control']) }}
                </div>

                {{ Form::hidden('_method', 'PUT') }}
                {{ Form::submit('Оновити', ['class' => 'btn btn-primary btn-lg']) }}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
