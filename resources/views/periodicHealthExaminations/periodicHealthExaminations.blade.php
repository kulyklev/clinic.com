@extends('layouts.layout')

@section('content')
    <a href="/periodicHealthExaminations/create">Нове обстеження</a>
    <br>
    <br>

    @if(count($periodicHealthExaminations) >= 1)
        @foreach($periodicHealthExaminations as $healthExamination)
            {{ $healthExamination->id }}
            {{ $healthExamination->patient_id }}
            {{ $healthExamination->nameOfExamination }}
            {{ $healthExamination->cabinetNumber }}
            {{ $healthExamination->dateOfExamination }}

            {!! Form::open(['action' => ['PeriodicHealthExaminationController@destroy', $healthExamination->id], 'method' => 'POST']) !!}
                {{ Form::hidden('_method', 'DELETE') }}
                {{ Form::submit('Удалить') }}
            {!! Form::close() !!}

            <a href="/periodicHealthExaminations/{{$healthExamination->id}}/edit">Змінити</a>
        @endforeach
    @else
        <p>This patient doesn`t have blood transfusions {{ $patientID }}</p>
    @endif
@endsection