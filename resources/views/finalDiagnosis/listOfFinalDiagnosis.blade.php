@extends('layouts.layout')

@section('content')
    <a href="/finalDiagnosis/create">Новий запис</a>
    <br>
    <br>

    @if(count($finalDiagnosis) >= 1)
        @foreach($finalDiagnosis as $diagnosis)
            {{ $diagnosis->dateOfTreatment }}
            {{ $diagnosis->finalDiagnosis }}
            {{ $diagnosis->firstTimeDiagnosed }}
            {{ $diagnosis->firstTimeDiagnosedOnProphylaxis }}
            {{ $diagnosis->doctor }}

            {!! Form::open(['action' => ['FinalDiagnosisController@destroy', $diagnosis->id], 'method' => 'POST']) !!}
                {{ Form::hidden('_method', 'DELETE') }}
                {{ Form::submit('Удалить') }}
            {!! Form::close() !!}

            <a href="/finalDiagnosis/{{$diagnosis->id}}/edit">Змінити</a>
            <br>
            <br>
        @endforeach
    @else
        <p>This patient doesn`t have history{{ $patientID }}</p>
    @endif

@endsection