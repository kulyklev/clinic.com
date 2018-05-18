@extends('layouts.layout')

@section('content')
    <a href="/listsOfSurgicalInterventions/create">Зареєструвати нову операцію</a>
    <br>
    <br>

    @if(count($surgeryList) >= 1)
        @foreach($surgeryList as $surgery)
            {{ $surgery->id }}
            {{ $surgery->patient_id }}
            {{ $surgery->operationName }}
            {{ $surgery->operationDate }}

            {!! Form::open(['action' => ['ListOfInfectiousDiseasesController@destroy', $surgery->id], 'method' => 'POST']) !!}
            {{ Form::hidden('_method', 'DELETE') }}
            {{ Form::submit('Удалить') }}
            {!! Form::close() !!}

            <a href="/listsOfSurgicalInterventions/{{$surgery->id}}/edit">Змінити</a>
        @endforeach
    @else
        <p>This patient doesn`t have Infectious Diseases {{ $patientID }}</p>
    @endif
@endsection

