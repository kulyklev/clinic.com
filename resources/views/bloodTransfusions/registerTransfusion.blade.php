<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Clinic</title>
</head>

<body>
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

</body>
</html>
