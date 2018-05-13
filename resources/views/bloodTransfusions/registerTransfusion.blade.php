@extends('layouts.layout')

@section('content')
    @include('includes.messages')
    {!! Form::open(['action' => 'BloodTransfusionsController@store', 'method' => 'POST']) !!}
    {{ Form::label('id', 'ID') }}<br>
    {{ Form::text('id', '') }}<br>

    {{ Form::label('transfusionDate', 'Дата переливання') }}<br>
    {{ Form::date('transfusionDate', \Carbon\Carbon::now()) }}<br>

    {{ Form::label('volume', 'Обєм') }}<br>
    {{ Form::number('volume', null) }}<br>

    {{ Form::submit('Добавить') }}<br>
    {!! Form::close() !!}
@endsection
