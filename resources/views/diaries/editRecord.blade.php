@extends('layouts.app')

@section('content')
    @include('includes.messages')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                {!! Form::open(['action' => ['DiaryRecordsController@update', 'patientID' => $patientID, $record->id], 'method' => 'POST']) !!}

                <div class="form-group">
                    {{ Form::label('appealDate', 'Дата звернення') }}
                    {{ Form::date('appealDate', \Carbon\Carbon::createFromFormat('Y-m-d', $record->appealDate), ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('placeOfTreatment', 'Місце проведення лікування') }}
                    {{ Form::select('placeOfTreatment', array('clinic' => 'Поліклініка', 'home' => 'Вдома', 'dayHospital' => 'Денний стаціонар', 'hospitalAtHome' => 'Стаціонар вдома'), $record->placeOfTreatment, ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('treatmentData', 'Скарги хворого, об’єктивні дані, діагноз, перебіг хвороби') }}
                    {{ Form::text('treatmentData', $record->treatmentData, ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('treatment', 'Призначення') }}
                    {{ Form::text('treatment', $record->treatment, ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('doctor', 'Лікар') }}
                    {{ Form::text('doctor', $record->doctor, ['class' => 'form-control']) }}
                </div>

                {{ Form::hidden('_method', 'PUT') }}
                {{ Form::submit('Оновити', ['class' => 'btn btn-primary btn-lg']) }}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection