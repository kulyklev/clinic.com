<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Clinic</title>
</head>

<body>

<a href="/bloodTransfusions/create">Нове переливання</a>
<br>
<br>

@if(count($bloodTransfusions) >= 1)
    @foreach($bloodTransfusions as $bloodTransfusion)
        {{ $bloodTransfusion->id }}
        {{ $bloodTransfusion->transfusionDate }}
        {{ $bloodTransfusion->volume }}

        {!! Form::open(['action' => ['BloodTransfusionsController@destroy', $bloodTransfusion->id], 'method' => 'POST']) !!}
            {{ Form::hidden('_method', 'DELETE') }}
            {{ Form::submit('Удалить') }}
        {!! Form::close() !!}

        <a href="/bloodTransfusions/{{$bloodTransfusion->id}}/edit">Змінити</a>
    @endforeach
@else
    <p>This patient doesn`t have blood transfusions {{ $patient->id }}</p>
@endif
</body>
</html>
