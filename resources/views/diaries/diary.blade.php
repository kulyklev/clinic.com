@extends('layouts.layout')

@section('content')
    <a href="/diaries/create">Новий запис</a>
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

            {!! Form::open(['action' => ['DiaryController@destroy', $record->id], 'method' => 'POST']) !!}
            {{ Form::hidden('_method', 'DELETE') }}
            {{ Form::submit('Удалить') }}
            {!! Form::close() !!}

            <a href="/diaries/{{$record->id}}/edit">Змінити</a>
        @endforeach
    @else
        <p>This patient doesn`t have records in his diary {{ $patientID }}</p>
    @endif
@endsection

