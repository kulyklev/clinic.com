@extends('layouts.layout')

@section('content')
    <a href="/listsOfInfectiousDiseases/create">Зареєструвати нове інфекційне захворювання</a>
    <br>
    <br>

    @if(count($listOfInfectiousDiseases) >= 1)
        @foreach($listOfInfectiousDiseases as $disease)
            {{ $disease->id }}
            {{ $disease->patient_id }}
            {{ $disease->vaccinationName }}

            {!! Form::open(['action' => ['ListOfInfectiousDiseasesController@destroy', $disease->id], 'method' => 'POST']) !!}
            {{ Form::hidden('_method', 'DELETE') }}
            {{ Form::submit('Удалить') }}
            {!! Form::close() !!}

            <a href="/listsOfInfectiousDiseases/{{$disease->id}}/edit">Змінити</a>
        @endforeach
    @else
        <p>This patient doesn`t have Infectious Diseases {{ $patientID }}</p>
    @endif
@endsection

