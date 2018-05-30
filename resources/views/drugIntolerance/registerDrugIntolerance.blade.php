@extends('layouts.app')

@section('content')
    @include('includes.messages')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                {!! Form::open(['action' => ['DrugIntoleranceController@store', 'patientID' => $patientID], 'method' => 'POST']) !!}

                <div class="form-group">
                    {{ Form::label('drugName', 'Назва лікарського препарату') }}
                    {{ Form::text('drugName', '', ['class' => 'form-control']) }}
                </div>

                {{ Form::submit('Додати', ['class' => 'btn btn-primary btn-lg']) }}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
