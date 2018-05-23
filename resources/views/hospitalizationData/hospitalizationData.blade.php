@extends('layouts.layout')

@section('content')
    <a href="{{ route('patient.hospitalizationData.create', ['patientID' => $patientID]) }}">Нова госпіталізація</a>
    <br>
    <br>

    @if(count($hospitalizationData) >= 1)
        @foreach($hospitalizationData as $data)
            {{ $data->id }}
            {{ $data->patient_id }}
            {{ $data->hospitalizationDate }}
            {{ $data->medicalFacilityName }}
            {{ $data->departmentName }}
            {{ $data->finalDiagnosis }}

            {!! Form::open(['action' => ['HospitalizationDataController@destroy', $patientID, $data->id], 'method' => 'POST']) !!}
            {{ Form::hidden('_method', 'DELETE') }}
            {{ Form::submit('Удалить') }}
            {!! Form::close() !!}

            <a href="{{ route('patient.hospitalizationData.edit', ['patientID' => $patientID, 'id' => $data->id]) }}">Змінити</a>
        @endforeach
    @else
        <p>This patient doesn`t have hospitalizations {{ $patientID }}</p>
    @endif
@endsection

