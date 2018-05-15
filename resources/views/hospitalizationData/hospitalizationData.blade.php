@extends('layouts.layout')

@section('content')
    <a href="/hospitalizationData/create">Нова госпіталізація</a>
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

            {!! Form::open(['action' => ['HospitalizationDataController@destroy', $data->id], 'method' => 'POST']) !!}
            {{ Form::hidden('_method', 'DELETE') }}
            {{ Form::submit('Удалить') }}
            {!! Form::close() !!}

            <a href="/hospitalizationData/{{$data->id}}/edit">Змінити</a>
        @endforeach
    @else
        <p>This patient doesn`t have hospitalizations {{ $patientID }}</p>
    @endif
@endsection

