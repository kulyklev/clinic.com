@extends('layouts.layout')

@section('content')
    <a href="/termsOfTemporaryDisability/create">Новий строк тимчасової непрацездатності</a>
    <br>
    <br>

    @if(count($termsOfTemporaryDisability) >= 1)
        @foreach($termsOfTemporaryDisability as $term)
            {{ $term->id }}
            {{ $term->patient_id }}
            {{ $term->openingDate }}
            {{ $term->closingDate }}
            {{ $term->finalDiagnosis }}
            {{ $term->doctor }}

            {!! Form::open(['action' => ['TermsOfTemporaryDisabilityController@destroy', $term->id], 'method' => 'POST']) !!}
            {{ Form::hidden('_method', 'DELETE') }}
            {{ Form::submit('Удалить') }}
            {!! Form::close() !!}

            <a href="/termsOfTemporaryDisability/{{$term->id}}/edit">Змінити</a>
        @endforeach
    @else
        <p>This patient doesn`t have terms of temporary disability {{ $patientID }}</p>
    @endif
@endsection

