@extends('layouts.layout')

@section('content')
    @include('includes.messages')
    {!! Form::open(['action' => ['DiaryController@update', $record->id], 'method' => 'POST']) !!}

    {{ Form::label('appealDate', 'Дата звернення') }}<br>
    {{ Form::date('appealDate', \Carbon\Carbon::createFromFormat('Y-m-d', $record->appealDate)) }}<br>

    {{ Form::label('placeOfTreatment', 'Місце проведення лікування') }}<br>
    {{ Form::select('placeOfTreatment', array('clinic' => 'Поліклініка', 'home' => 'Вдома', 'dayHospital' => 'Денний стаціонар', 'hospitalAtHome' => 'Стаціонар вдома')) }}<br>

    {{ Form::label('treatmentData', 'Скарги хворого, об’єктивні дані, діагноз, перебіг хвороби') }}<br>
    {{ Form::text('treatmentData', $record->treatmentData) }}<br>

    {{ Form::label('treatment', 'Призначення') }}<br>
    {{ Form::text('treatment', $record->treatment) }}<br>

    {{ Form::label('doctor', 'Лікар') }}<br>
    {{ Form::text('doctor', $record->doctor) }}<br>

    {{ Form::hidden('_method', 'PUT') }}
    {{ Form::submit('Оновити') }}<br>
    {!! Form::close() !!}
@endsection