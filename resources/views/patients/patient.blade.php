@extends('layouts.layout')

@section('content')
    @if(!is_null($patient))
        {{ $patient->name }}
        {{ $patient->surname }}
        {{ $patient->patronymic }}
        {{ $patient->gender }}
        {{ $patient->bdate }}
        {{ $patient->homePhoneNumber }}
        {{ $patient->workPhoneNumber }}
        {{ $patient->address }}
        {{ $patient->placeOfWorkAndPosition }}
        {{ $patient->dispensaryGroup }}
        {{--TODO Add contingent--}}
        {{ $patient->PrivilegeCertificateID }}
        {{ $patient->bloodType }}
        {{ $patient->rh }}
        {{ $patient->diabetes }}

        <a href="/patients/{{$patient->id}}/edit">
            Змінити
        </a>
        <br>
        <a href="/bloodTransfusions/{{$patient->id}}">
            Переливання крові
        </a>
        <br>
        <a href="/finalDiagnosis/{{$patient->id}}">
            Заключні діагнози
        </a>
        <br>

    @else
        <p>No such patient</p>
    @endif
@endsection

