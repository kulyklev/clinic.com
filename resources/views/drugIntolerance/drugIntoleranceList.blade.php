@extends('layouts.layout')

@section('content')
    <a href="{{ route('patient.drugIntolerance.create', ['patientID' => $patientID]) }}">Зареєструвати нову непереносимість до лікарських препаратів</a>
    <br>
    <br>

    @if(count($drugList) >= 1)
        @foreach($drugList as $drug)
            {{ $drug->id }}
            {{ $drug->patient_id }}
            {{ $drug->drugName }}

            {!! Form::open(['action' => ['DrugIntoleranceController@destroy', $patientID, $drug->id], 'method' => 'POST']) !!}
            {{ Form::hidden('_method', 'DELETE') }}
            {{ Form::submit('Удалить') }}
            {!! Form::close() !!}

            <a href="{{ route('patient.drugIntolerance.edit', ['patientID' => $patientID, 'id' => $drug->id]) }}">Змінити</a>
        @endforeach
    @else
        <p>This patient doesn`t have allergies {{ $patientID }}</p>
    @endif
@endsection

