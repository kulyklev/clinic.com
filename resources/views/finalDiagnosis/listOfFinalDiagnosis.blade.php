@extends('layouts.layout')

@section('content')
    <a href="{{ route('patient.finalDiagnosis.create', ['patientID' => $patientID]) }}">Новий запис</a>
    <br>
    <br>

    @if(count($finalDiagnosis) >= 1)
        @foreach($finalDiagnosis as $diagnosis)
            {{ $diagnosis->dateOfTreatment }}
            {{ $diagnosis->finalDiagnosis }}
            {{ $diagnosis->firstTimeDiagnosed }}
            {{ $diagnosis->firstTimeDiagnosedOnProphylaxis }}
            {{ $diagnosis->doctor }}

            {!! Form::open(['action' => ['FinalDiagnosisController@destroy', $diagnosis->id, $patientID], 'method' => 'POST']) !!}
                {{ Form::hidden('_method', 'DELETE') }}
                {{ Form::submit('Удалить') }}
            {!! Form::close() !!}

            <a href="{{ route('patient.finalDiagnosis.edit', ['patientID' => $patientID, 'id' => $diagnosis->id]) }}">Змінити</a>
            <br>
            <br>
        @endforeach
    @else
        <p>This patient doesn`t have history{{ $patientID }}</p>
    @endif

@endsection