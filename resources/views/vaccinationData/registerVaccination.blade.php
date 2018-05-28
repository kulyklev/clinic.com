@extends('layouts.app')

@section('content')
    @include('includes.messages')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                {!! Form::open(['action' => ['VaccinationController@store', 'patientID' => $patientID], 'method' => 'POST']) !!}

                <div class="form-group">
                    {{ Form::label('vaccinationName', 'Найменування щеплення') }}
                    {{ Form::text('vaccinationName', '', ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('vaccinationType', 'Вакцинація чи ревакцинація') }}
                    {{ Form::select('vaccinationType', array('vaccination' => 'Вакцинація', 'revaccination' => 'Ревакцинація'), null,['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('vaccinationDate', 'Дата вакцинації') }}
                    {{ Form::date('vaccinationDate', \Carbon\Carbon::now(), ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('age', 'Вік') }}
                    {{ Form::number('age', null, ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('dose', 'Доза') }}
                    {{ Form::number('dose', null, ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('series', 'Серія') }}
                    {{ Form::text('series', '', ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('nameOfTheDrug', 'Назва препарату') }}
                    {{ Form::text('nameOfTheDrug', '', ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('methodOfInput', 'Спосіб введення') }}
                    {{ Form::text('methodOfInput', '', ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('localReaction', 'Місцева реакція на щеплення') }}
                    {{ Form::text('localReaction', '', ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('globalReaction', 'Загальна реакія на щеплення') }}
                    {{ Form::text('globalReaction', '', ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('medicalContraindications', 'Медичні протипоказання') }}
                    {{ Form::text('medicalContraindications', '', ['class' => 'form-control']) }}
                </div>

                {{ Form::submit('Додати', ['class' => 'btn btn-primary btn-lg']) }}<br>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
