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

        <br>
        <br>

        <a href="{{ route("patient.bloodTransfusions.index", ['patientId' => $patient->id]) }}">
            Переливання крові
        </a>
        <br>

        <a href="{{ route("patient.finalDiagnosis.index", ['patientId' => $patient->id]) }}">
            Заключні діагнози
        </a>
        <br>

        <a href="{{ route("patient.periodicHealthExaminations.index", ['patientId' => $patient->id]) }}">
            Листок профілактичного огляду
        </a>
        <br>

        <a href="{{ route("patient.vaccination.index", ['patientId' => $patient->id]) }}">
            Відомості про щеплення
        </a>
        <br>

        <a href="{{ route("patient.hospitalizationData.index", ['patientId' => $patient->id]) }}">
            Інформація про госпіталізацію
        </a>
        <br>

        <a href="{{ route("patient.termsOfTemporaryDisability.index", ['patientId' => $patient->id]) }}">
            Строки тимчасової непрацездатності
        </a>
        <br>

        <a href="{{ route("patient.diaries.index", ['patientId' => $patient->id]) }}">
            Щоденник
        </a>
        <br>

        @if($patient->dispensaryGroup == true)
            <a href="{{ route("patient.annualEpicrisis.index", ['patientId' => $patient->id]) }}">
                Щорічний епікриз на диспансенрного хворого
            </a>
            <br>
        @endif

        <a href="{{ route("patient.infectiousDiseases.index", ['patientId' => $patient->id]) }}">
            Інфекційні захворювання
        </a>
        <br>

        <a href="{{ route("patient.surgicalInterventions.index", ['patientId' => $patient->id]) }}">
            Хірургічні втручання
        </a>
        <br>

        <a href="{{ route("patient.allergicHistories.index", ['patientId' => $patient->id]) }}">
            Алелгорологічний анамнез
        </a>
        <br>

        <a href="{{ route("patient.drugIntolerance.index", ['patientId' => $patient->id]) }}">
            Непереносимість до лікарських препаратів
        </a>
        <br>

    @else
        <p>No such patient</p>
    @endif
@endsection

