@extends('layouts.app')

@section('content')
    @include('includes.messages')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                {!! Form::open(['action' => ['HospitalizationDataController@update', 'patientID' => $patientID, 'id' => $hospitalizationData->id], 'method' => 'POST']) !!}

                <div class="form-group">
                    {{ Form::label('hospitalizationDate', 'Дата госпіталізації') }}
                    {{ Form::date('hospitalizationDate', \Carbon\Carbon::createFromFormat('Y-m-d', $hospitalizationData->hospitalizationDate), ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('medicalFacilityName', 'Назва лікувального закладу') }}
                    {{ Form::text('medicalFacilityName', $hospitalizationData->medicalFacilityName, ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('departmentName', 'Назва відділення') }}
                    {{ Form::text('departmentName', $hospitalizationData->departmentName, ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('finalDiagnosis', 'Заключний діагноз') }}
                    {{ Form::text('finalDiagnosis', $hospitalizationData->finalDiagnosis, ['class' => 'form-control']) }}
                </div>

                {{ Form::hidden('_method', 'PUT') }}
                {{ Form::submit('Оновити') }}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection