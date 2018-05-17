@extends('layouts.layout')

@section('content')
    <a href="/annualEpicrisis/create">Новий епікриз</a>
    <br>
    <br>

    @if(count($annualEpicrisis) >= 1)
        @foreach($annualEpicrisis as $epicrisis)
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

            {!! Form::open(['action' => ['AnnualEpicrisisController@destroy', $epicrisis->id], 'method' => 'POST']) !!}
            {{ Form::hidden('_method', 'DELETE') }}
            {{ Form::submit('Удалить') }}
            {!! Form::close() !!}

            <a href="/annualEpicrisis/{{$epicrisis->id}}/edit">Змінити</a>
        @endforeach
    @else
        <p>This patient doesn`t have vaccinations {{ $patientID }}</p>
    @endif
@endsection

