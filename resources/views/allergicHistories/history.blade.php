@extends('layouts.layout')

@section('content')
    <a href="/allergicHistories/create">Зареєструвати нову алергію</a>
    <br>
    <br>

    @if(count($allergiesList) >= 1)
        @foreach($allergiesList as $allergy)
            {{ $allergy->id }}
            {{ $allergy->patient_id }}
            {{ $allergy->allergyName }}

            {!! Form::open(['action' => ['AllergicHistoryController@destroy', $allergy->id], 'method' => 'POST']) !!}
            {{ Form::hidden('_method', 'DELETE') }}
            {{ Form::submit('Удалить') }}
            {!! Form::close() !!}

            <a href="/allergicHistories/{{$allergy->id}}/edit">Змінити</a>
        @endforeach
    @else
        <p>This patient doesn`t have allergies {{ $patientID }}</p>
    @endif
@endsection

