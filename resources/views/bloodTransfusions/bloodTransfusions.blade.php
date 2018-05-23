@extends('layouts.layout')

@section('content')
    <a href="{{ route('patient.bloodTransfusions.create', ['patientID' => $patientID]) }}">Нове переливання</a>
    <br>
    <br>

    @if(count($bloodTransfusions) >= 1)
        @foreach($bloodTransfusions as $bloodTransfusion)
            {{ $bloodTransfusion->id }}
            {{ $bloodTransfusion->transfusionDate }}
            {{ $bloodTransfusion->volume }}

            {!! Form::open(['action' => ['BloodTransfusionsController@destroy', $patientID, $bloodTransfusion->id], 'method' => 'POST']) !!}
                {{ Form::hidden('_method', 'DELETE') }}
                {{ Form::submit('Видалити') }}
            {!! Form::close() !!}

            <a href="{{ route('patient.bloodTransfusions.edit', ['patientID' => $patientID, 'id' => $bloodTransfusion->id]) }}">Змінити</a>
        @endforeach
    @else
        <p>This patient doesn`t have blood transfusions {{ $patientID }}</p>
    @endif
@endsection
