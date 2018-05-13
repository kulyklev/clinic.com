@extends('layouts.layout')

@section('content')
    @include('includes.messages')
    {!! Form::open(['action' => 'VaccinationDataController@store', 'method' => 'POST']) !!}
    {{ Form::label('patient_id', 'patient_id') }}<br>
    {{ Form::text('patient_id', '') }}<br>

    {{ Form::label('vaccinationName', 'Найменування щеплення') }}<br>
    {{ Form::text('vaccinationName', '') }}<br>

    {{ Form::label('vaccinationType', 'Вакцинація чи ревакцинація') }}<br>
    {{ Form::select('vaccinationType', array('vaccination' => 'Вакцинація', 'revaccination' => 'Ревакцинація')) }}<br>

    {{ Form::label('vaccinationDate', 'Дата вакцинації') }}<br>
    {{ Form::date('vaccinationDate', \Carbon\Carbon::now()) }}<br>

    {{ Form::label('age', 'Вік') }}<br>
    {{ Form::number('age', null) }}<br>

    {{ Form::label('dose', 'Доза') }}<br>
    {{ Form::number('dose', null) }}<br>

    {{ Form::label('series', 'Серія') }}<br>
    {{ Form::text('series', '') }}<br>

    {{ Form::label('nameOfTheDrug', 'Назва препарату') }}<br>
    {{ Form::text('nameOfTheDrug', '') }}<br>

    {{ Form::label('methodOfInput', 'Спосіб введення') }}<br>
    {{ Form::text('methodOfInput', '') }}<br>

    {{ Form::label('localReaction', 'Місцева реакція на щеплення') }}<br>
    {{ Form::text('localReaction', '') }}<br>

    {{ Form::label('globalReaction', 'Загальна реакія на щеплення') }}<br>
    {{ Form::text('globalReaction', '') }}<br>

    {{ Form::label('medicalContraindications', 'Медичні протипоказання') }}<br>
    {{ Form::text('medicalContraindications', '') }}<br>

    {{ Form::submit('Добавить') }}<br>
    {!! Form::close() !!}
@endsection