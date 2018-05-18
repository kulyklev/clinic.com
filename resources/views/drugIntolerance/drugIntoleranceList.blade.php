@extends('layouts.layout')

@section('content')
    <a href="/drugIntolerance/create">Зареєструвати нову непереносимість до лікарських препаратів</a>
    <br>
    <br>

    @if(count($drugList) >= 1)
        @foreach($drugList as $drug)
            {{ $drug->id }}
            {{ $drug->patient_id }}
            {{ $drug->drugName }}

            {!! Form::open(['action' => ['DrugIntoleranceController@destroy', $drug->id], 'method' => 'POST']) !!}
            {{ Form::hidden('_method', 'DELETE') }}
            {{ Form::submit('Удалить') }}
            {!! Form::close() !!}

            <a href="/drugIntolerance/{{$drug->id}}/edit">Змінити</a>
        @endforeach
    @else
        <p>This patient doesn`t have allergies {{ $patientID }}</p>
    @endif
@endsection

