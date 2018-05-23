@extends('layouts.layout')

@section('content')
    <a href="{{ route('patient.infectiousDiseases.create', ['patientID' => $patientID]) }}">Зареєструвати нове інфекційне захворювання</a>
    <br>
    <br>

    @if(count($listOfInfectiousDiseases) >= 1)
        @foreach($listOfInfectiousDiseases as $disease)
            {{ $disease->id }}
            {{ $disease->patient_id }}
            {{ $disease->diseaseName }}

            {!! Form::open(['action' => ['InfectiousDiseasesController@destroy', $patientID, $disease->id], 'method' => 'POST']) !!}
            {{ Form::hidden('_method', 'DELETE') }}
            {{ Form::submit('Удалить') }}
            {!! Form::close() !!}

            <a href="{{ route('patient.infectiousDiseases.edit', ['patientID' => $patientID, 'id' => $disease->id]) }}">Змінити</a>
        @endforeach
    @else
        <p>This patient doesn`t have Infectious Diseases {{ $patientID }}</p>
    @endif
@endsection

