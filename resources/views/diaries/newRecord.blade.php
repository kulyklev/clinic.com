@extends('layouts.app')

@section('content')
    @include('includes.messages')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                {!! Form::open(['action' => ['DiaryController@store', 'patientID' => $patientID], 'method' => 'POST']) !!}

                <div class="form-group">
                    {{ Form::label('appealDate', 'Дата звернення') }}
                    {{ Form::date('appealDate', \Carbon\Carbon::now(), ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('placeOfTreatment', 'Місце проведення лікування') }}
                    {{ Form::select('placeOfTreatment', array('clinic' => 'Поліклініка', 'home' => 'Вдома', 'dayHospital' => 'Денний стаціонар', 'hospitalAtHome' => 'Стаціонар вдома'), null, ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('treatmentData', 'Скарги хворого, об’єктивні дані, діагноз, перебіг хвороби') }}
                    {{ Form::text('treatmentData', '', ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('treatment', 'Призначення') }}
                    {{ Form::text('treatment', '', ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('doctor', 'Лікар') }}
                    {{ Form::text('doctor', '', ['class' => 'form-control']) }}
                </div>

                {{ Form::submit('Додати', ['class' => 'btn btn-primary btn-lg']) }}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection