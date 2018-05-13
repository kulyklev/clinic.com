@extends('layouts.layout')

@section('content')
    @include('includes.messages')
    {!! Form::open(['action' => ['PatientsController@update', $patient->id], 'method' => 'POST']) !!}
    {{ Form::label('name', 'Имя') }}<br>
    {{ Form::text('name', $patient->name) }}<br>

    {{ Form::label('surname', 'Фмилия') }}<br>
    {{ Form::text('surname', $patient->surname) }}<br>

    {{ Form::label('patronymic', 'Отчество') }}<br>
    {{ Form::text('patronymic', $patient->patronymic) }}<br>

    @if($patient->gender == 'male')
        {{ Form::label('gender', 'Пол') }}<br>
        {{ Form::label('gender', 'Мужской') }}
        {{ Form::radio('gender', 'male', true) }}
        {{ Form::label('gender', 'Женский') }}
        {{ Form::radio('gender', 'female') }}<br>
    @else
        {{ Form::label('gender', 'Пол') }}<br>
        {{ Form::label('gender', 'Мужской') }}
        {{ Form::radio('gender', 'male') }}
        {{ Form::label('gender', 'Женский') }}
        {{ Form::radio('gender', 'female', true) }}<br>
    @endif

    {{ Form::label('bdate', 'День рождения') }}<br>
    {{ Form::date('bdate', \Carbon\Carbon::createFromFormat('Y-m-d', $patient->bdate)) }}<br>

    {{ Form::label('homePhoneNumber', 'Домашний номер телефона') }}<br>
    {{ Form::text('homePhoneNumber', $patient->homePhoneNumber) }}<br>

    {{ Form::label('workPhoneNumber', 'Рабочий номер телефона') }}<br>
    {{ Form::text('workPhoneNumber', $patient->workPhoneNumber) }}<br>

    {{ Form::label('address', 'Адресс') }}<br>
    {{ Form::text('address', $patient->address) }}<br>

    {{ Form::label('placeOfWorkAndPosition', 'Место работы, должность') }}<br>
    {{ Form::text('placeOfWorkAndPosition', $patient->placeOfWorkAndPosition) }}<br>

    @if($patient->dispensaryGroup == false)
        {{ Form::label('dispensaryGroup', 'Диспансерная группа') }}<br>
        {{ Form::label('dispensaryGroup', 'Да') }}
        {{ Form::radio('dispensaryGroup', true) }}
        {{ Form::label('dispensaryGroup', 'Нет') }}
        {{ Form::radio('dispensaryGroup', false, true) }}<br>
    @else
        {{ Form::label('dispensaryGroup', 'Диспансерная группа') }}<br>
        {{ Form::label('dispensaryGroup', 'Да') }}
        {{ Form::radio('dispensaryGroup', true, true) }}
        {{ Form::label('dispensaryGroup', 'Нет') }}
        {{ Form::radio('dispensaryGroup', false) }}<br>
    @endif

    {{ Form::label('contingent', 'Контингент') }}<br>
    {{ Form::label('contingent', 'інваліди війни') }}
    {{ Form::checkbox('contingent', 'warInvalid') }}<br>
    {{ Form::label('contingent', 'учасники війни') }}
    {{ Form::checkbox('contingent', 'participantsInTheWar') }}<br>
    {{ Form::label('contingent', 'учасники бойових дій') }}
    {{ Form::checkbox('contingent', 'combatants') }}<br>
    {{ Form::label('contingent', 'інші інваліди') }}
    {{ Form::checkbox('contingent', 'otherPeopleWithDisabilities') }}<br>
    {{ Form::label('contingent', 'ліквідатори аварії на ЧАЕС') }}
    {{ Form::checkbox('contingent', 'liquidatorsOFChAS') }}<br>
    {{ Form::label('contingent', 'евакуйовані') }}
    {{ Form::checkbox('contingent', 'evacuated') }}<br>
    {{ Form::label('contingent', 'жителі, які проживають  на території радіоекологічного контролю') }}
    {{ Form::checkbox('contingent', ' livingOnTheTerritoryOfRadioecologicalControl') }}<br>
    {{ Form::label('contingent', 'діти, які народилися від батьків 1-3 груп, постраждалих від аварії на ЧАЕС') }}
    {{ Form::checkbox('contingent', 'childrenBornFromTheParentsOf1-3GroupsAffectedByTheChernobylAccident') }}<br>
    {{ Form::label('contingent', 'інші пільгові категорії (вписати)') }}
    {{ Form::checkbox('contingent', 'otherCategories') }}<br>

    {{ Form::label('PrivilegeCertificateID', 'Номер пільгового посвідчення') }}<br>
    {{ Form::text('PrivilegeCertificateID', $patient->PrivilegeCertificateID) }}<br>

    {{ Form::label('bloodType', 'Група крові') }}<br>
    {{ Form::text('bloodType', $patient->bloodType) }}<br>

    {{ Form::label('rh', 'Резус фактор') }}<br>
    {{ Form::text('rh', $patient->rh) }}<br>

    {{ Form::label('diabetes', 'Діабет') }}<br>
    {{ Form::text('diabetes', $patient->diabetes) }}<br>

    {{ Form::hidden('_method', 'PUT') }}
    {{ Form::submit('Обновить') }}<br>
    {!! Form::close() !!}
@endsection

