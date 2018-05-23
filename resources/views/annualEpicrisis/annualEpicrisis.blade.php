@extends('layouts.layout')

@section('content')
    <a href="{{ route('patient.annualEpicrisis.create', ['patientID' => $patientID]) }}">Новий епікриз</a>
    <br>
    <br>

    @if(count($epicrisisAnnual) >= 1)
        @foreach($epicrisisAnnual as $epicrisis)
            {{ $epicrisis->id }}
            {{ $epicrisis->patient_id }}
            {{ $epicrisis->epicrisisDate }}
            {{ $epicrisis->causeOfObservation }}
            {{ $epicrisis->mainDiagnosis }}
            {{ $epicrisis->concomitantDiagnoses }}
            {{ $epicrisis->numberOfAggravations }}
            {{ $epicrisis->carryingOutTreatment }}
            {{ $epicrisis->disabilityGroup }}
            {{ $epicrisis->sanatoriumAndSpaTreatment }}

            {!! Form::open(['action' => ['EpicrisisAnnualController@destroy', $patientID, $epicrisis->id], 'method' => 'POST']) !!}
            {{ Form::hidden('_method', 'DELETE') }}
            {{ Form::submit('Удалить') }}
            {!! Form::close() !!}

            <a href="{{ route('patient.annualEpicrisis.edit', ['patientID' => $patientID, 'id' => $epicrisis->id]) }}">Змінити</a>
        @endforeach
    @else
        <p>This patient doesn`t have vaccinations {{ $patientID }}</p>
    @endif
@endsection

