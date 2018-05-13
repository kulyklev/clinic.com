@extends('layouts.layout')

@section('content')
    @include('includes.messages')
    {!! Form::open(['action' => ['BloodTransfusionsController@update', $bloodTransfusions->id], 'method' => 'PUT']) !!}
    {{ Form::label('transfusionDate', 'Дата переливання') }}<br>
    {{ Form::date('transfusionDate', $bloodTransfusions->transfusionDate) }}<br>

    {{ Form::label('volume', 'Об\'єм') }}<br>
    {{ Form::number('volume', $bloodTransfusions->volume) }}<br>

    {{ Form::submit('Обновить') }}<br>
    {!! Form::close() !!}
@endsection
