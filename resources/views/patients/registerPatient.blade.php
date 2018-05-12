<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Clinic</title>


</head>
<body>
    @include('includes.messages')
    {!! Form::open(['action' => 'PatientsController@store', 'method' => 'POST']) !!}
        {{ Form::label('name', 'Имя') }}<br>
        {{ Form::text('name', '') }}<br>

        {{ Form::label('surname', 'Фмилия') }}<br>
        {{ Form::text('surname', '') }}<br>

        {{ Form::label('patronymic', 'Отчество') }}<br>
        {{ Form::text('patronymic', '') }}<br>

        {{ Form::label('gender', 'Пол') }}<br>
        {{ Form::label('gender', 'Мужской') }}
        {{ Form::radio('gender', 'male') }}
        {{ Form::label('gender', 'Женский') }}
        {{ Form::radio('gender', 'female') }}<br>

        {{ Form::label('bdate', 'День рождения') }}<br>
        {{ Form::date('bdate', \Carbon\Carbon::now()) }}<br>

        {{ Form::label('homePhoneNumber', 'Домашний номер телефона') }}<br>
        {{ Form::text('homePhoneNumber', '') }}<br>

        {{ Form::label('workPhoneNumber', 'Рабочий номер телефона') }}<br>
        {{ Form::text('workPhoneNumber', '') }}<br>

        {{ Form::label('address', 'Адресс') }}<br>
        {{ Form::text('address', '') }}<br>

        {{ Form::label('placeOfWorkAndPosition', 'Место работы, должность') }}<br>
        {{ Form::text('placeOfWorkAndPosition', '') }}<br>

        {{ Form::label('dispensaryGroup', 'Диспансерная группа') }}<br>
        {{ Form::label('dispensaryGroup', 'Да') }}
        {{ Form::radio('dispensaryGroup', true) }}
        {{ Form::label('dispensaryGroup', 'Нет') }}
        {{ Form::radio('dispensaryGroup', false) }}<br>

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
        {{ Form::text('PrivilegeCertificateID', '') }}<br>

        {{ Form::label('bloodType', 'Група крові') }}<br>
        {{ Form::select('bloodType', array('1' => 1, '2' => 2, '3' => 3, '4' => 4)) }}<br>

        {{ Form::label('rh', 'Резус фактор') }}<br>
        {{ Form::label('rh', 'Позитивний') }}
        {{ Form::radio('rh', true) }}
        {{ Form::label('rh', 'Негативний') }}
        {{ Form::radio('rh', false) }}<br>

        {{ Form::label('diabetes', 'Діабет') }}<br>
        {{ Form::text('diabetes', '') }}<br>

    {{ Form::submit('Добавить') }}<br>
    {!! Form::close() !!}
</body>
</html>
