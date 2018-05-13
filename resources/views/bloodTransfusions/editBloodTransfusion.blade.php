@extends('layouts.layout')

@section('content')
    @include('includes.messages')
    {!! Form::open(['action' => ['BloodTransfusionsController@update', $bloodTransfusions->id], 'method' => 'POST']) !!}
    {{ Form::label('transfusionDate', 'Дата переливання') }}<br>
    {{ Form::date('transfusionDate', \Carbon\Carbon::createFromFormat('Y-m-d', $bloodTransfusions->transfusionDate)) }}<br>

    {{ Form::label('volume', 'Об\'єм') }}<br>
    {{ Form::number('volume', $bloodTransfusions->volume) }}<br>

    {{ Form::hidden('_method', 'PUT') }}
    {{ Form::submit('Обновить') }}<br>
    {!! Form::close() !!}
@endsection
