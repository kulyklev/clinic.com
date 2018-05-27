@extends('layouts.app')

@section('content')
    @include('includes.messages')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                {!! Form::open(['action' => ['PatientsController@update', $patient->id], 'method' => 'POST']) !!}
                <div class="row">
                    <div class="form-group col">
                        {{ Form::label('name', 'Ім&#39;я') }}
                        {{ Form::text('name', $patient->name, ['class' => 'form-control', 'placeholder' => 'Введіть ім&#39;я']) }}
                    </div>

                    <div class="form-group col">
                        {{ Form::label('surname', 'Прізвище') }}
                        {{ Form::text('surname', $patient->surname, ['class' => 'form-control', 'placeholder' => 'Введіть врізвище']) }}
                    </div>

                    <div class="form-group col">
                        {{ Form::label('patronymic', 'По батькові') }}
                        {{ Form::text('patronymic', $patient->patronymic, ['class' => 'form-control', 'placeholder' => 'Введіть ім&#39;я по батькові']) }}
                    </div>
                </div>

                <div class="form-group">
                    @if($patient->gender == 'male')
                        {{ Form::label('gender', 'Стать', ['class' => 'form-check-label']) }}
                        <div class="form-check form-check-inline">
                            {{ Form::radio('gender', 'male', true, ['class' => 'form-check-input', 'id' => 'maleRadio']) }}
                            {{ Form::label('maleRadio', 'Чоловіча', ['class' => 'form-check-label']) }}
                        </div>

                        <div class="form-check form-check-inline">
                            {{ Form::radio('gender', 'female', false,['class' => 'form-check-input', 'id' => 'femaleRadio']) }}
                            {{ Form::label('femaleRadio', 'Жіноча', ['class' => 'form-check-label']) }}
                        </div>
                    @else
                        {{ Form::label('gender', 'Стать', ['class' => 'form-check-label']) }}
                        <div class="form-check form-check-inline">
                            {{ Form::radio('gender', 'male', false, ['class' => 'form-check-input', 'id' => 'maleRadio']) }}
                            {{ Form::label('maleRadio', 'Чоловіча', ['class' => 'form-check-label']) }}
                        </div>

                        <div class="form-check form-check-inline">
                            {{ Form::radio('gender', 'female', true,['class' => 'form-check-input', 'id' => 'femaleRadio']) }}
                            {{ Form::label('femaleRadio', 'Жіноча', ['class' => 'form-check-label']) }}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    {{ Form::label('bdate', 'День народження') }}
                    {{ Form::date('bdate', \Carbon\Carbon::createFromFormat('Y-m-d', $patient->bdate), ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('homePhoneNumber', 'Домашній номер телефону') }}
                    {{ Form::text('homePhoneNumber', $patient->homePhoneNumber, ['class' => 'form-control', 'placeholder' => 'Введіть домашній номер телефону']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('workPhoneNumber', 'Робочий номер телефону') }}
                    {{ Form::text('workPhoneNumber', $patient->workPhoneNumber, ['class' => 'form-control', 'placeholder' => 'Введіть робочий номер телефону']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('address', 'Адреса') }}
                    {{ Form::text('address', $patient->address, ['class' => 'form-control', 'placeholder' => 'Введіть адресу проживання']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('placeOfWorkAndPosition', 'Місце роботи, посада') }}
                    {{ Form::text('placeOfWorkAndPosition', $patient->placeOfWorkAndPosition, ['class' => 'form-control', 'placeholder' => 'Введіть місце роботи та посаду']) }}
                </div>

                <div class="form-group">
                    @if($patient->dispensaryGroup == false)
                        {{ Form::label('dispensaryGroup', 'Диспансерная группа', ['class' => 'form-check-label']) }}
                        <div class="form-check form-check-inline">
                            {{ Form::radio('dispensaryGroup', 1, false, ['class' => 'form-check-input', 'id' => 'yesRadio']) }}
                            {{ Form::label('yesRadio', 'Так', ['class' => 'form-check-label']) }}
                        </div>

                        <div class="form-check form-check-inline">
                            {{ Form::radio('dispensaryGroup', 0, true, ['class' => 'form-check-input', 'id' => 'noRadio']) }}
                            {{ Form::label('noRadio', 'Ні', ['class' => 'form-check-label']) }}
                        </div>
                    @else
                        {{ Form::label('dispensaryGroup', 'Диспансерная группа', ['class' => 'form-check-label']) }}
                        <div class="form-check form-check-inline">
                            {{ Form::radio('dispensaryGroup', 1, true, ['class' => 'form-check-input', 'id' => 'yesRadio']) }}
                            {{ Form::label('yesRadio', 'Так', ['class' => 'form-check-label']) }}
                        </div>

                        <div class="form-check form-check-inline">
                            {{ Form::radio('dispensaryGroup', 0, false, ['class' => 'form-check-input', 'id' => 'noRadio']) }}
                            {{ Form::label('noRadio', 'Ні', ['class' => 'form-check-label']) }}
                        </div>
                    @endif
                </div>

                {{-- TODO Add change from radio to checkbox--}}
                <div class="form-group">
                    {{ Form::label('contingent', 'Контингент', ['class' => 'form-check-label']) }}
                    <div class="form-check">
                        @if($patient->contingent == 'warInvalid')
                            {{ Form::radio('contingent', 'warInvalid', true, ['class' => 'form-check-input', 'id' => 'warInvalidRadio']) }}
                            {{ Form::label('warInvalidRadio', 'інваліди війни', ['class' => 'form-check-label']) }}
                        @else
                            {{ Form::radio('contingent', 'warInvalid', false, ['class' => 'form-check-input', 'id' => 'warInvalidRadio']) }}
                            {{ Form::label('warInvalidRadio', 'інваліди війни', ['class' => 'form-check-label']) }}
                        @endif
                    </div>

                    <div class="form-check">
                        @if($patient->contingent == 'participantsInTheWar')
                            {{ Form::radio('contingent', 'participantsInTheWar', true, ['class' => 'form-check-input',  'id' => 'participantsInTheWarRadio']) }}
                            {{ Form::label('participantsInTheWarRadio', 'учасники війни', ['class' => 'form-check-label']) }}
                        @else
                            {{ Form::radio('contingent', 'participantsInTheWar', false, ['class' => 'form-check-input',  'id' => 'participantsInTheWarRadio']) }}
                            {{ Form::label('participantsInTheWarRadio', 'учасники війни', ['class' => 'form-check-label']) }}
                        @endif
                    </div>

                    <div class="form-check">
                        @if($patient->contingent == 'combatants')
                            {{ Form::radio('contingent', 'combatants', true, ['class' => 'form-check-input',  'id' => 'combatantsRadio']) }}
                            {{ Form::label('combatantsRadio', 'учасники бойових дій', ['class' => 'form-check-label']) }}
                        @else
                            {{ Form::radio('contingent', 'combatants', false, ['class' => 'form-check-input',  'id' => 'combatantsRadio']) }}
                            {{ Form::label('combatantsRadio', 'учасники бойових дій', ['class' => 'form-check-label']) }}
                        @endif
                    </div>

                    <div class="form-check">
                        @if($patient->contingent == 'otherPeopleWithDisabilities')
                            {{ Form::radio('contingent', 'otherPeopleWithDisabilities', true, ['class' => 'form-check-input', 'id' => 'otherPeopleWithDisabilitiesRadio']) }}
                            {{ Form::label('otherPeopleWithDisabilitiesRadio', 'інші інваліди', ['class' => 'form-check-label']) }}
                        @else
                            {{ Form::radio('contingent', 'otherPeopleWithDisabilities', false, ['class' => 'form-check-input', 'id' => 'otherPeopleWithDisabilitiesRadio']) }}
                            {{ Form::label('otherPeopleWithDisabilitiesRadio', 'інші інваліди', ['class' => 'form-check-label']) }}
                        @endif
                    </div>

                    <div class="form-check">
                        @if($patient->contingent == 'liquidatorsOFChAS')
                            {{ Form::radio('contingent', 'liquidatorsOFChAS', true, ['class' => 'form-check-input', 'id' => 'liquidatorsOFChASRadio']) }}
                            {{ Form::label('liquidatorsOFChASRadio', 'ліквідатори аварії на ЧАЕС', ['class' => 'form-check-label']) }}
                        @else
                            {{ Form::radio('contingent', 'liquidatorsOFChAS', false, ['class' => 'form-check-input', 'id' => 'liquidatorsOFChASRadio']) }}
                            {{ Form::label('liquidatorsOFChASRadio', 'ліквідатори аварії на ЧАЕС', ['class' => 'form-check-label']) }}
                        @endif
                    </div>

                    <div class="form-check">
                        @if($patient->contingent == 'evacuated')
                            {{ Form::radio('contingent', 'evacuated', true, ['class' => 'form-check-input', 'id' => 'evacuatedRadio']) }}
                            {{ Form::label('evacuatedRadio', 'евакуйовані', ['class' => 'form-check-label']) }}
                        @else
                            {{ Form::radio('contingent', 'evacuated', false, ['class' => 'form-check-input', 'id' => 'evacuatedRadio']) }}
                            {{ Form::label('evacuatedRadio', 'евакуйовані', ['class' => 'form-check-label']) }}
                        @endif
                    </div>

                    <div class="form-check">
                        @if($patient->contingent == 'livingOnTheTerritoryOfRadioecologicalControl')
                            {{ Form::radio('contingent', 'livingOnTheTerritoryOfRadioecologicalControl', true, ['class' => 'form-check-input', 'id' => 'livingOnTheTerritoryOfRadioecologicalControlRadio']) }}
                            {{ Form::label('livingOnTheTerritoryOfRadioecologicalControlRadio', 'жителі, які проживають  на території радіоекологічного контролю', ['class' => 'form-check-label']) }}
                        @else
                            {{ Form::radio('contingent', 'livingOnTheTerritoryOfRadioecologicalControl', false, ['class' => 'form-check-input', 'id' => 'livingOnTheTerritoryOfRadioecologicalControlRadio']) }}
                            {{ Form::label('livingOnTheTerritoryOfRadioecologicalControlRadio', 'жителі, які проживають  на території радіоекологічного контролю', ['class' => 'form-check-label']) }}
                        @endif
                    </div>

                    <div class="form-check">
                        @if($patient->contingent == 'childrenBornFromTheParentsOf1-3GroupsAffectedByTheChernobylAccident')
                            {{ Form::radio('contingent', 'childrenBornFromTheParentsOf1-3GroupsAffectedByTheChernobylAccident', true, ['class' => 'form-check-input', 'id' => 'childrenBornFromTheParentsOf1-3GroupsAffectedByTheChernobylAccidentRadio']) }}
                            {{ Form::label('childrenBornFromTheParentsOf1-3GroupsAffectedByTheChernobylAccidentRadio', 'діти, які народилися від батьків 1-3 груп, постраждалих від аварії на ЧАЕС', ['class' => 'form-check-label']) }}
                        @else
                            {{ Form::radio('contingent', 'childrenBornFromTheParentsOf1-3GroupsAffectedByTheChernobylAccident', false, ['class' => 'form-check-input', 'id' => 'childrenBornFromTheParentsOf1-3GroupsAffectedByTheChernobylAccidentRadio']) }}
                            {{ Form::label('childrenBornFromTheParentsOf1-3GroupsAffectedByTheChernobylAccidentRadio', 'діти, які народилися від батьків 1-3 груп, постраждалих від аварії на ЧАЕС', ['class' => 'form-check-label']) }}
                        @endif
                    </div>

                    {{-- TODO Add 'other categories'
                    {{ Form::label('contingent', 'інші пільгові категорії (вписати)') }}
                    {{ Form::checkbox('contingent', 'otherCategories') }}<br>
                    --}}
                </div>

                <div class="form-group">
                    {{ Form::label('PrivilegeCertificateID', 'Номер пільгового посвідчення') }}
                    {{ Form::text('PrivilegeCertificateID', $patient->PrivilegeCertificateID, ['class' => 'form-control', 'placeholder' => 'Введіть номер пільгового посвідчення']) }}
                </div>

                <div class="row">
                    <div class="col form-group">
                        {{ Form::label('bloodType', 'Група крові') }}
                        {{ Form::select('bloodType', array('1' => 1, '2' => 2, '3' => 3, '4' => 4), $patient->bloodType, ['class' => 'form-control']) }}<br>
                    </div>

                    <div class="col form-group">
                        {{ Form::label('rh', 'Резус фактор') }}

                        @if($patient->rh == 1)
                            <div class="form-check">
                                {{ Form::radio('rh', '1', true, ['class' => 'form-check-input', 'id' => 'rhPositive']) }}
                                {{ Form::label('rhPositive', 'Позитивний') }}
                            </div>

                            <div class="form-check">
                                {{ Form::radio('rh', '0', false, ['class' => 'form-check-input', 'id' => 'rhNegative']) }}
                                {{ Form::label('rhNegative', 'Негативний') }}
                            </div>
                        @else
                            <div class="form-check">
                                {{ Form::radio('rh', '1', false, ['class' => 'form-check-input', 'id' => 'rhPositive']) }}
                                {{ Form::label('rhPositive', 'Позитивний') }}
                            </div>

                            <div class="form-check">
                                {{ Form::radio('rh', '0', true, ['class' => 'form-check-input', 'id' => 'rhNegative']) }}
                                {{ Form::label('rhNegative', 'Негативний') }}
                            </div>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('diabetes', 'Діабет') }}
                    {{ Form::text('diabetes', $patient->diabetes, ['class' => 'form-control']) }}
                </div>

                {{ Form::hidden('_method', 'PUT') }}
                {{ Form::submit('Оновити', ['class' => 'btn btn-primary btn-lg']) }}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

