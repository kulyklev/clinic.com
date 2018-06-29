@extends('layouts.app')

@section('content')
    <div class="container">
    @if(!is_null($patient))
            <div class="row">
                <div class="col-md-8">
                    <table class="table table-borderless table-hover">
                        <tbody>
                            <tr>
                                <th>Ім&#39;я</th>
                                <th>{{ $patient->name }}</th>
                            </tr>

                            <tr>
                                <th>Прізвище</th>
                                <th>{{ $patient->surname }}</th>
                            </tr>

                            <tr>
                                <th>По батькові</th>
                                <th>{{ $patient->patronymic }}</th>
                            </tr>

                            <tr>
                                <th>Стать</th>
                                <th>{{ $patient->gender }}</th>
                            </tr>

                            <tr>
                                <th>День народження</th>
                                <th>{{ $patient->bdate }}</th>
                            </tr>

                            <tr>
                                <th>Домашній номер телефону</th>
                                <th>{{ $patient->homePhoneNumber }}</th>
                            </tr>

                            <tr>
                                <th>Робочий номер телефону</th>
                                <th>{{ $patient->workPhoneNumber }}</th>
                            </tr>

                            <tr>
                                <th>Адреса</th>
                                <th>{{ $patient->address }}</th>
                            </tr>

                            <tr>
                                <th>Місце роботи, посада</th>
                                <th>{{ $patient->placeOfWorkAndPosition  }}</th>
                            </tr>

                            <tr>
                                <th>Диспансерная группа</th>
                                <th>{{ $patient->dispensaryGroup }}</th>
                            </tr>

                            <tr>
                                <th>Контингент</th>
                                <th>{{ $patient->contingent }}</th>
                            </tr>

                            <tr>
                                <th>Номер пільгового посвідчення</th>
                                <th>{{ $patient->PrivilegeCertificateID }}</th>
                            </tr>

                            <tr>
                                <th>Група крові</th>
                                <th>{{ $patient->bloodType }}</th>
                            </tr>

                            <tr>
                                <th>Резус фактор</th>
                                <th>{{ $patient->rh }}</th>
                            </tr>

                            <tr>
                                <th>Діабет</th>
                                <th>{{ $patient->diabetes }}</th>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="col">
                    <div class="btn-group-vertical">
                        <a href="{{ route("patient.bloodTransfusions.index", ['patientId' => $patient->id]) }}" class="btn btn-info">
                            Переливання крові
                        </a>

                        <a href="{{ route("patient.finalDiagnosis.index", ['patientId' => $patient->id]) }}" class="btn btn-info">
                            Заключні діагнози
                        </a>

                        <a href="{{ route("patient.periodicHealthExaminations.index", ['patientId' => $patient->id]) }}" class="btn btn-info">
                            Листок профілактичного огляду
                        </a>

                        <a href="{{ route("patient.vaccination.index", ['patientId' => $patient->id]) }}" class="btn btn-info">
                            Відомості про щеплення
                        </a>

                        <a href="{{ route("patient.hospitalizationData.index", ['patientId' => $patient->id]) }}" class="btn btn-info">
                            Інформація про госпіталізацію
                        </a>

                        <a href="{{ route("patient.termsOfTemporaryDisability.index", ['patientId' => $patient->id]) }}" class="btn btn-info">
                            Строки тимчасової непрацездатності
                        </a>

                        <a href="{{ route("patient.diaryRecords.index", ['patientId' => $patient->id]) }}" class="btn btn-info">
                            Щоденник
                        </a>

                        @if($patient->dispensaryGroup == true)
                            <a href="{{ route("patient.annualEpicrisis.index", ['patientId' => $patient->id]) }}" class="btn btn-info">
                                Щорічний епікриз на диспансенрного хворого
                            </a>
                        @endif

                        <a href="{{ route("patient.infectiousDiseases.index", ['patientId' => $patient->id]) }}" class="btn btn-info">
                            Інфекційні захворювання
                        </a>

                        <a href="{{ route("patient.surgicalInterventions.index", ['patientId' => $patient->id]) }}" class="btn btn-info">
                            Хірургічні втручання
                        </a>

                        <a href="{{ route("patient.allergicHistories.index", ['patientId' => $patient->id]) }}" class="btn btn-info">
                            Алелгорологічний анамнез
                        </a>

                        <a href="{{ route("patient.drugIntolerance.index", ['patientId' => $patient->id]) }}" class="btn btn-info">
                            Непереносимість до лікарських препаратів
                        </a>
                    </div>
                </div>

    @elseif(!Auth::user()->isDoctor)
                {{--TODO ADD user id to patient --}}
                <div class="col-md-8">
                    <div class="form-group">
                        {!! Form::open(['action' => ['PatientsController@setUserId'], 'method' => 'POST']) !!}
                        {{ Form::label('patientID', 'Введіть свій номер пацієнта') }}
                        {{ Form::text('patientID', '', ['class' => 'form-control']) }}
                        {{ Form::submit('Ввести', ['class' => 'btn btn-primary']) }}
                        {!! Form::close() !!}
                    </div>
                </div>
    @else
                <div class="alert alert-primary" role="alert">
                    <p>No records</p>
                </div>
    @endif
            </div>
    </div>
@endsection

