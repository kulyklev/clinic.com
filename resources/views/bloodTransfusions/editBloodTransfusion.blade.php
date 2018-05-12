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
{!! Form::open(['action' => ['BloodTransfusionsController@update', $bloodTransfusions->id], 'method' => 'PUT']) !!}
    {{ Form::label('transfusionDate', 'Дата переливання') }}<br>
    {{ Form::date('transfusionDate', $bloodTransfusions->transfusionDate) }}<br>

    {{ Form::label('volume', 'Об\'єм') }}<br>
    {{ Form::number('volume', $bloodTransfusions->volume) }}<br>

    {{ Form::submit('Обновить') }}<br>
{!! Form::close() !!}

</body>
</html>
