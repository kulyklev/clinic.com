@extends('layouts.layout')

@section('content')
    @include('includes.messages')
    {!! Form::open(['action' => ['BloodTransfusionsController@store', 'patientID' => $patientID], 'method' => 'POST']) !!}

    {{ Form::label('transfusionDate', 'Дата переливання') }}<br>
    {{ Form::date('transfusionDate', \Carbon\Carbon::now()) }}<br>

    {{ Form::label('volume', 'Об\'єм') }}<br>
    {{ Form::number('volume', null) }}<br>

    {{ Form::submit('Додати') }}<br>
    {!! Form::close() !!}
@endsection
