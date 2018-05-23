@extends('layouts.layout')

@section('content')
    <a href="{{ route('patient.surgicalInterventions.create', ['patientID' => $patientID]) }}">Зареєструвати нову операцію</a>
    <br>
    <br>

    @if(count($surgeryList) >= 1)
        @foreach($surgeryList as $surgery)
            {{ $surgery->id }}
            {{ $surgery->patient_id }}
            {{ $surgery->operationName }}
            {{ $surgery->operationDate }}

            {!! Form::open(['action' => ['SurgicalInterventionsController@destroy', $patientID, $surgery->id], 'method' => 'POST']) !!}
            {{ Form::hidden('_method', 'DELETE') }}
            {{ Form::submit('Удалить') }}
            {!! Form::close() !!}

            <a href="{{ route('patient.surgicalInterventions.edit', ['patientID' => $patientID, 'id' => $surgery->id]) }}">Змінити</a>
        @endforeach
    @else
        <p>This patient doesn`t have Infectious Diseases {{ $patientID }}</p>
    @endif
@endsection

