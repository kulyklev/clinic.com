@extends('layouts.app')

@section('content')
    @include('includes.messages')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                {!! Form::open(['action' => ['HospitalizationDataController@store', 'patientID' => $patientID], 'method' => 'POST']) !!}

                <div class="form-group">
                    {{ Form::label('hospitalizationDate', 'Дата госпіталізації') }}
                    {{ Form::date('hospitalizationDate', \Carbon\Carbon::now(), ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('medicalFacilityName', 'Назва лікувального закладу') }}
                    {{ Form::text('medicalFacilityName', '', ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('departmentName', 'Назва відділення') }}
                    {{ Form::text('departmentName', '', ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('finalDiagnosis', 'Заключний діагноз') }}
                    {{ Form::text('finalDiagnosis', '', ['class' => 'form-control']) }}
                </div>

                {{ Form::submit('Додати', ['class' => 'btn btn-primary btn-lg']) }}<br>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection