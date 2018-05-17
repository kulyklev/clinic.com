@extends('layouts.layout')

@section('content')
    @include('includes.messages')
    {!! Form::open(['action' => 'DiaryController@store', 'method' => 'POST']) !!}
    {{ Form::label('patient_id', 'patient_id') }}<br>
    {{ Form::text('patient_id', '') }}<br>

    {{ Form::label('appealDate', 'Дата звернення') }}<br>
    {{ Form::date('appealDate', \Carbon\Carbon::now()) }}<br>

    {{ Form::label('placeOfTreatment', 'Місце проведення лікування') }}<br>
    {{ Form::select('placeOfTreatment', array('clinic' => 'Поліклініка', 'home' => 'Вдома', 'dayHospital' => 'Денний стаціонар', 'hospitalAtHome' => 'Стаціонар вдома')) }}<br>

    {{ Form::label('treatmentData', 'Скарги хворого, об’єктивні дані, діагноз, перебіг хвороби') }}<br>
    {{ Form::text('treatmentData', '') }}<br>

    {{ Form::label('treatment', 'Призначення') }}<br>
    {{ Form::text('treatment', '') }}<br>

    {{ Form::label('doctor', 'Лікар') }}<br>
    {{ Form::text('doctor', '') }}<br>

    {{ Form::submit('Добавить') }}<br>
    {!! Form::close() !!}
@endsection