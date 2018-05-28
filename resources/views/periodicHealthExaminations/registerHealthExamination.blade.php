@extends('layouts.app')

@section('content')
    @include('includes.messages')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                {!! Form::open(['action' => ['PeriodicHealthExaminationController@store', 'patientID' => $patientID], 'method' => 'POST']) !!}

                <div class="form-group">
                    {{ Form::label('nameOfExamination', 'Найменування обстеження') }}
                    {{ Form::text('nameOfExamination', '', ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('cabinetNumber', 'Номер кабінету') }}
                    {{ Form::number('cabinetNumber', null, ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('dateOfExamination', 'Рік і дата проведення') }}
                    {{ Form::date('dateOfExamination', \Carbon\Carbon::now(), ['class' => 'form-control']) }}
                </div>

                {{ Form::submit('Додати', ['class' => 'btn btn-primary btn-lg']) }}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection