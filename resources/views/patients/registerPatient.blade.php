@extends('layouts.app')

@section('content')
    @include('includes.messages')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                {!! Form::open(['action' => 'PatientsController@store', 'method' => 'POST']) !!}
                <div class="row">
                    <div class="form-group col">
                        {{ Form::label('name', 'Ім&#39;я') }}
                        {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Введіть ім&#39;я']) }}
                    </div>

                    <div class="form-group col">
                        {{ Form::label('surname', 'Прізвище') }}
                        {{ Form::text('surname', '', ['class' => 'form-control', 'placeholder' => 'Введіть врізвище']) }}
                    </div>

                    <div class="form-group col">
                        {{ Form::label('patronymic', 'По батькові') }}
                        {{ Form::text('patronymic', '', ['class' => 'form-control', 'placeholder' => 'Введіть ім&#39;я по батькові']) }}
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('gender', 'Стать', ['class' => 'form-check-label']) }}
                    <div class="form-check form-check-inline">
                        {{ Form::radio('gender', 'male', false, ['class' => 'form-check-input', 'id' => 'maleRadio']) }}
                        {{ Form::label('maleRadio', 'Чоловіча', ['class' => 'form-check-label']) }}
                    </div>

                    <div class="form-check form-check-inline">
                        {{ Form::radio('gender', 'female', false,['class' => 'form-check-input', 'id' => 'femaleRadio']) }}
                        {{ Form::label('femaleRadio', 'Жіноча', ['class' => 'form-check-label']) }}
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('bdate', 'День народження') }}
                    {{ Form::date('bdate', \Carbon\Carbon::now(), ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('homePhoneNumber', 'Домашній номер телефону') }}
                    {{ Form::text('homePhoneNumber', '', ['class' => 'form-control', 'placeholder' => 'Введіть домашній номер телефону']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('workPhoneNumber', 'Робочий номер телефону') }}
                    {{ Form::text('workPhoneNumber', '', ['class' => 'form-control', 'placeholder' => 'Введіть робочий номер телефону']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('address', 'Адреса') }}
                    {{ Form::text('address', '', ['class' => 'form-control', 'placeholder' => 'Введіть адресу проживання']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('placeOfWorkAndPosition', 'Місце роботи, посада') }}
                    {{ Form::text('placeOfWorkAndPosition', '', ['class' => 'form-control', 'placeholder' => 'Введіть місце роботи та посаду']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('dispensaryGroup', 'Диспансерная группа', ['class' => 'form-check-label']) }}
                    <div class="form-check form-check-inline">
                        {{ Form::radio('dispensaryGroup', 1, false, ['class' => 'form-check-input', 'id' => 'yesRadio']) }}
                        {{ Form::label('yesRadio', 'Так', ['class' => 'form-check-label']) }}
                    </div>

                    <div class="form-check form-check-inline">
                        {{ Form::radio('dispensaryGroup', 0, false, ['class' => 'form-check-input', 'id' => 'noRadio']) }}
                        {{ Form::label('noRadio', 'Ні', ['class' => 'form-check-label']) }}
                    </div>
                </div>

                {{-- TODO Add change from radio to checkbox--}}
                <div class="form-group">
                    {{ Form::label('contingent', 'Контингент', ['class' => 'form-check-label']) }}
                    <div class="form-check">
                        {{ Form::radio('contingent', 'warInvalid', false, ['class' => 'form-check-input', 'id' => 'warInvalidRadio']) }}
                        {{ Form::label('warInvalidRadio', 'інваліди війни', ['class' => 'form-check-label']) }}
                    </div>

                    <div class="form-check">
                        {{ Form::radio('contingent', 'participantsInTheWar', false, ['class' => 'form-check-input', 'id' => 'participantsInTheWarRadio']) }}
                        {{ Form::label('participantsInTheWarRadio', 'учасники війни', ['class' => 'form-check-label']) }}
                    </div>

                    <div class="form-check">
                        {{ Form::radio('contingent', 'combatants', false, ['class' => 'form-check-input', 'id' => 'combatantsRadio']) }}
                        {{ Form::label('combatantsRadio', 'учасники бойових дій', ['class' => 'form-check-label']) }}
                    </div>

                    <div class="form-check">
                        {{ Form::radio('contingent', 'otherPeopleWithDisabilities', false, ['class' => 'form-check-input', 'id' => 'otherPeopleWithDisabilitiesRadio']) }}
                        {{ Form::label('otherPeopleWithDisabilitiesRadio', 'інші інваліди', ['class' => 'form-check-label']) }}
                    </div>

                    <div class="form-check">
                        {{ Form::radio('contingent', 'liquidatorsOFChAS', false, ['class' => 'form-check-input', 'id' => 'liquidatorsOFChASRadio']) }}
                        {{ Form::label('liquidatorsOFChASRadio', 'ліквідатори аварії на ЧАЕС', ['class' => 'form-check-label']) }}
                    </div>

                    <div class="form-check">
                        {{ Form::radio('contingent', 'evacuated', false, ['class' => 'form-check-input', 'id' => 'evacuatedRadio']) }}
                        {{ Form::label('evacuatedRadio', 'евакуйовані', ['class' => 'form-check-label']) }}
                    </div>

                    <div class="form-check">
                        {{ Form::radio('contingent', 'livingOnTheTerritoryOfRadioecologicalControl', false, ['class' => 'form-check-input', 'id' => 'livingOnTheTerritoryOfRadioecologicalControlRadio']) }}
                        {{ Form::label('livingOnTheTerritoryOfRadioecologicalControlRadio', 'жителі, які проживають  на території радіоекологічного контролю', ['class' => 'form-check-label']) }}
                    </div>

                    <div class="form-check">
                        {{ Form::radio('contingent', 'childrenBornFromTheParentsOf1-3GroupsAffectedByTheChernobylAccident', false, ['class' => 'form-check-input', 'id' => 'childrenBornFromTheParentsOf1-3GroupsAffectedByTheChernobylAccidentRadio']) }}
                        {{ Form::label('childrenBornFromTheParentsOf1-3GroupsAffectedByTheChernobylAccidentRadio', 'діти, які народилися від батьків 1-3 груп, постраждалих від аварії на ЧАЕС', ['class' => 'form-check-label']) }}
                    </div>

                    {{-- TODO Add 'other categories'
                    {{ Form::label('contingent', 'інші пільгові категорії (вписати)') }}
                    {{ Form::checkbox('contingent', 'otherCategories') }}<br>
                    --}}
                </div>

                <div class="form-group">
                    {{ Form::label('PrivilegeCertificateID', 'Номер пільгового посвідчення') }}
                    {{ Form::text('PrivilegeCertificateID', '', ['class' => 'form-control', 'placeholder' => 'Введіть номер пільгового посвідчення']) }}
                </div>

                <div class="row">
                    <div class="col form-group">
                        {{ Form::label('bloodType', 'Група крові') }}
                        {{ Form::select('bloodType', array('1' => 1, '2' => 2, '3' => 3, '4' => 4), null, ['class' => 'form-control']) }}<br>
                    </div>

                    <div class="col form-group">
                        {{ Form::label('rh', 'Резус фактор') }}
                        <div class="form-check">
                            {{ Form::radio('rh', '1', false, ['class' => 'form-check-input', 'id' => 'rhPositive']) }}
                            {{ Form::label('rhPositive', 'Позитивний') }}
                        </div>

                        <div class="form-check">
                            {{ Form::radio('rh', '0', false, ['class' => 'form-check-input', 'id' => 'rhNegative']) }}
                            {{ Form::label('rhNegative', 'Негативний') }}
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('diabetes', 'Діабет') }}
                    {{ Form::text('diabetes', '', ['class' => 'form-control']) }}
                </div>

                {{ Form::submit('Додати', ['class' => 'btn btn-primary btn-lg']) }}
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection
