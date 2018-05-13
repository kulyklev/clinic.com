@extends('layouts.layout')

@section('content')
    @include('includes.messages')
    {!! Form::open(['action' => ['VaccinationDataController@update', $vaccinationData->id], 'method' => 'POST']) !!}

    {{ Form::label('vaccinationName', 'Найменування щеплення') }}<br>
    {{ Form::text('vaccinationName', $vaccinationData->vaccinationName) }}<br>

    {{ Form::label('vaccinationType', 'Вакцинація чи ревакцинація') }}<br>
    {{ Form::select('vaccinationType', array('vaccination' => 'Вакцинація', 'revaccination' => 'Ревакцинація')) }}<br>

    {{ Form::label('vaccinationDate', 'Дата вакцинації') }}<br>
    {{ Form::date('vaccinationDate', \Carbon\Carbon::createFromFormat('Y-m-d', $vaccinationData->vaccinationDate)) }}<br>

    {{ Form::label('age', 'Вік') }}<br>
    {{ Form::number('age', $vaccinationData->age) }}<br>

    {{ Form::label('dose', 'Доза') }}<br>
    {{ Form::number('dose', $vaccinationData->dose) }}<br>

    {{ Form::label('series', 'Серія') }}<br>
    {{ Form::text('series', $vaccinationData->series) }}<br>

    {{ Form::label('nameOfTheDrug', 'Назва препарату') }}<br>
    {{ Form::text('nameOfTheDrug', $vaccinationData->nameOfTheDrug) }}<br>

    {{ Form::label('methodOfInput', 'Спосіб введення') }}<br>
    {{ Form::text('methodOfInput', $vaccinationData->methodOfInput) }}<br>

    {{ Form::label('localReaction', 'Місцева реакція на щеплення') }}<br>
    {{ Form::text('localReaction', $vaccinationData->localReaction) }}<br>

    {{ Form::label('globalReaction', 'Загальна реакія на щеплення') }}<br>
    {{ Form::text('globalReaction', $vaccinationData->globalReaction) }}<br>

    {{ Form::label('medicalContraindications', 'Медичні протипоказання') }}<br>
    {{ Form::text('medicalContraindications', $vaccinationData->medicalContraindications) }}<br>

    {{ Form::hidden('_method', 'PUT') }}
    {{ Form::submit('Оновити') }}<br>
    {!! Form::close() !!}
@endsection