@extends('layouts.layout')

@section('content')
    <a href="{{ route('patient.vaccination.create', ['patientID' => $patientID]) }}">Нова вакцінація</a>
    <br>
    <br>

    @if(count($vaccinationData) >= 1)
        @foreach($vaccinationData as $vaccinationDatum)
            {{ $vaccinationDatum->id }}
            {{ $vaccinationDatum->patient_id }}
            {{ $vaccinationDatum->vaccinationName }}
            {{ $vaccinationDatum->vaccinationType }}
            {{ $vaccinationDatum->vaccinationDate }}
            {{ $vaccinationDatum->age }}
            {{ $vaccinationDatum->dose }}
            {{ $vaccinationDatum->series }}
            {{ $vaccinationDatum->nameOfTheDrug }}
            {{ $vaccinationDatum->methodOfInput }}
            {{ $vaccinationDatum->localReaction }}
            {{ $vaccinationDatum->globalReaction }}
            {{ $vaccinationDatum->medicalContraindications }}

            {!! Form::open(['action' => ['VaccinationController@destroy', $patientID, $vaccinationDatum->id], 'method' => 'POST']) !!}
            {{ Form::hidden('_method', 'DELETE') }}
            {{ Form::submit('Удалить') }}
            {!! Form::close() !!}

            <a href="{{ route('patient.vaccination.edit', ['patientID' => $patientID, 'id' => $vaccinationDatum->id]) }}">Змінити</a>
        @endforeach
    @else
        <p>This patient doesn`t have vaccinations {{ $patientID }}</p>
    @endif
@endsection

