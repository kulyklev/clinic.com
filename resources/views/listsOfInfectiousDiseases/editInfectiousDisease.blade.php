@extends('layouts.app')

@section('content')
    @include('includes.messages')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                {!! Form::open(['action' => ['InfectiousDiseasesController@update', 'patientID' => $patientID, $infectiousDisease->id], 'method' => 'POST']) !!}

                <div class="form-group">
                    {{ Form::label('diseaseName', 'Назва захворювання') }}
                    {{ Form::text('diseaseName', $infectiousDisease->diseaseName, ['class' => 'form-control']) }}
                </div>

                {{ Form::hidden('_method', 'PUT') }}
                {{ Form::submit('Оновити', ['class' => 'btn btn-primary btn-lg']) }}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
