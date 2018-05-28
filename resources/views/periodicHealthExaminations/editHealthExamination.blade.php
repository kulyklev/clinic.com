@extends('layouts.app')

@section('content')
    @include('includes.messages')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                {!! Form::open(['action' => ['PeriodicHealthExaminationController@update', 'patientID' => $patientID, 'id' => $periodicHealthExamination->id], 'method' => 'POST']) !!}

                <div class="form-group">
                    {{ Form::label('nameOfExamination', 'Найменування обстеження') }}
                    {{ Form::text('nameOfExamination', $periodicHealthExamination->nameOfExamination, ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('cabinetNumber', 'Номер кабінету') }}
                    {{ Form::number('cabinetNumber', $periodicHealthExamination->cabinetNumber, ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('dateOfExamination', 'Рік і дата проведення') }}
                    {{ Form::date('dateOfExamination', \Carbon\Carbon::createFromFormat('Y-m-d', $periodicHealthExamination->dateOfExamination), ['class' => 'form-control']) }}
                </div>

                {{ Form::hidden('_method', 'PUT') }}
                {{ Form::submit('Оновити', ['class' => 'btn btn-primary btn-lg']) }}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection