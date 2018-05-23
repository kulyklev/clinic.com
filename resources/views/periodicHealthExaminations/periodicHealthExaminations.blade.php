@extends('layouts.layout')

@section('content')
    <a href="{{ route('patient.periodicHealthExaminations.create', ['patientID' => $patientID]) }}">Нове обстеження</a>
    <br>
    <br>

    @if(count($periodicHealthExaminations) >= 1)
        @foreach($periodicHealthExaminations as $healthExamination)
            {{ $healthExamination->id }}
            {{ $healthExamination->patient_id }}
            {{ $healthExamination->nameOfExamination }}
            {{ $healthExamination->cabinetNumber }}
            {{ $healthExamination->dateOfExamination }}

            {!! Form::open(['action' => ['PeriodicHealthExaminationController@destroy', $patientID, $healthExamination->id], 'method' => 'POST']) !!}
                {{ Form::hidden('_method', 'DELETE') }}
                {{ Form::submit('Удалить') }}
            {!! Form::close() !!}

            <a href="{{ route('patient.periodicHealthExaminations.edit', ['patientID' => $patientID, 'id' => $healthExamination->id]) }}">Змінити</a>
        @endforeach
    @else
        <p>This patient doesn`t have blood transfusions {{ $patientID }}</p>
    @endif
@endsection