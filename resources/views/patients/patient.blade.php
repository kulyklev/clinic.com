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

        <a href="/periodicHealthExaminations/{{$patient->id}}">
            Листок профілактичного огляду
        </a>
        <br>

        <a href="/vaccinationData/{{$patient->id}}">
            Відомості про щеплення
        </a>
        <br>

        <a href="/hospitalizationData/{{$patient->id}}">
            Інформація про госпіталізацію
        </a>
        <br>

        <a href="/termsOfTemporaryDisability/{{$patient->id}}">
            Строки тимчасової непрацездатності
        </a>
        <br>

        <a href="/diaries/{{$patient->id}}">
            Щоденник
        </a>
        <br>

        @if($patient->dispensaryGroup == true)
            <a href="/annualEpicrisis/{{$patient->id}}">
                Щорічний епікриз на диспансенрного хворого
            </a>
            <br>
        @endif

    @else
        <p>No such patient</p>
    @endif
@endsection

