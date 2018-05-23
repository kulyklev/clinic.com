@extends('layouts.layout')

@section('content')
    <a href="{{ route('patient.diaries.create', ['patientID' => $patientID]) }}">Новий запис</a>
    <br>
    <br>

    @if(count($diary) >= 1)
        @foreach($diary as $record)
            {{ $record->id }}
            {{ $record->patient_id }}
            {{ $record->appealDate }}
            {{ $record->placeOfTreatment }}
            {{ $record->treatmentData }}
            {{ $record->treatment }}
            {{ $record->doctor }}

            {!! Form::open(['action' => ['DiaryController@destroy', $patientID, $record->id], 'method' => 'POST']) !!}
            {{ Form::hidden('_method', 'DELETE') }}
            {{ Form::submit('Удалить') }}
            {!! Form::close() !!}

            <a href="{{ route('patient.diaries.edit', ['patientID' => $patientID, 'id' => $record->id]) }}">Змінити</a>
        @endforeach
    @else
        <p>This patient doesn`t have records in his diary {{ $patientID }}</p>
    @endif
@endsection

