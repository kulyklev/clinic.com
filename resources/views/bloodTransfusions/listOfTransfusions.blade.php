<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Clinic</title>
</head>

<body>
@if(count($patients) >= 1)
    @foreach($patients as $patient)
        {{ $patient->name }}
        {{ $patient->surname }}
        {{ $patient->patronymic }}
        {{ $patient->transfusionDate }}
        {{ $patient->volume }}

        {{--Destroy button--}}
        {!! Form::open(['action' => ['BloodTransfusionsController@destroy', $patient->id], 'method' => 'POST']) !!}
        {{ Form::hidden('_method', 'DELETE') }}
        {{ Form::submit('Удалить') }}
        {!! Form::close() !!}
    @endforeach

@else
    <p>No patients who did transfusion</p>
@endif

</body>
</html>
