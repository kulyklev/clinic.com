@extends('layouts.app')

@section('content')
    @include('includes.messages')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                {!! Form::open(['action' => ['VaccinationController@update', 'patientID' => $patientID, 'id' => $vaccinationData->id], 'method' => 'POST']) !!}

                <div class="form-group">
                    {{ Form::label('vaccinationName', 'Найменування щеплення') }}
                    {{ Form::text('vaccinationName', $vaccinationData->vaccinationName, ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('vaccinationType', 'Вакцинація чи ревакцинація') }}
                    {{ Form::select('vaccinationType', array('vaccination' => 'Вакцинація', 'revaccination' => 'Ревакцинація'), $vaccinationData->vaccinationType,['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('vaccinationDate', 'Дата вакцинації') }}
                    {{ Form::date('vaccinationDate', \Carbon\Carbon::createFromFormat('Y-m-d', $vaccinationData->vaccinationDate), ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('age', 'Вік') }}
                    {{ Form::number('age', $vaccinationData->age, ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('dose', 'Доза') }}
                    {{ Form::number('dose', $vaccinationData->dose, ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('series', 'Серія') }}
                    {{ Form::text('series', $vaccinationData->series, ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('nameOfTheDrug', 'Назва препарату') }}
                    {{ Form::text('nameOfTheDrug', $vaccinationData->nameOfTheDrug, ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('methodOfInput', 'Спосіб введення') }}
                    {{ Form::text('methodOfInput', $vaccinationData->methodOfInput, ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('localReaction', 'Місцева реакція на щеплення') }}
                    {{ Form::text('localReaction', $vaccinationData->localReaction, ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('globalReaction', 'Загальна реакія на щеплення') }}
                    {{ Form::text('globalReaction', $vaccinationData->globalReaction, ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('medicalContraindications', 'Медичні протипоказання') }}
                    {{ Form::text('medicalContraindications', $vaccinationData->medicalContraindications, ['class' => 'form-control']) }}
                </div>

                {{ Form::hidden('_method', 'PUT') }}
                {{ Form::submit('Оновити', ['class' => 'btn btn-primary btn-lg']) }}
            </div>
        </div>
    </div>
@endsection