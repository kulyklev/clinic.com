@extends('layouts.app')

@section('content')
    @include('includes.messages')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                {!! Form::open(['action' => ['InfectiousDiseasesController@store', 'patientID' => $patientID], 'method' => 'POST']) !!}

                <div class="form-group">
                    {{ Form::label('diseaseName', 'Назва захворювання') }}
                    {{ Form::text('diseaseName', '', ['class' => 'form-control']) }}
                </div>

                {{ Form::submit('Додати', ['class' => 'btn btn-primary btn-lg']) }}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection