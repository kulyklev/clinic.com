@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <table class="table table-striped" style="width:100%">
                        <thead class="thead-light">
                            <tr>
                                <th>Код хворого</th>
                                <th>Ім'я</th>
                                <th>Прізвище</th>
                                <th>По батькові</th>
                                <th>День народження</th>
                                <th>Домашній номер телефону</th>
                                <th>Робочий номер телефону</th>
                                <th>Адреса</th>
                                <th>Диспансерна група</th>
                                <th>Контингент</th>
                                <th>Номер пільгового посвідчення</th>
                                <th></th>
                            </tr>
                        </thead>

                @if(count($patients) >= 1)
                    @foreach($patients as $patient)
                        <tr>
                            <td>{{ $patient->id }}</td>
                            <td>{{ $patient->name }}</td>
                            <td>{{ $patient->surname }}</td>
                            <td>{{ $patient->patronymic }}</td>
                            <td>{{ $patient->bdate }}</td>
                            <td>{{ $patient->homePhoneNumber }}</td>
                            <td>{{ $patient->workPhoneNumber }}</td>
                            <td>{{ $patient->address }}</td>
                            <td>{{ $patient->dispensaryGroup }}</td>
                            <td>Контингент</td>{{--<td>{{ TODO Add contingent }}</td>--}}
                            <td>{{ $patient->PrivilegeCertificateID }}</td>
                            <td style="white-space: nowrap">
                                <a href="{{route("patient.show", ['id' => $patient->id])}}" class="btn btn-success d-xs-inline-block d-sm-inline-block d-md-inline-block d-lg-inline-block d-xl-inline-block">Переглянути</a>
                                <a href="{{route("patient.edit", ['id' => $patient->id])}}" class="btn btn-primary d-xs-inline-block d-sm-inline-block d-md-inline-block d-lg-inline-block d-xl-inline-block">Редагувати</a>
                                {!! Form::open(['action' => ['PatientsController@destroy', $patient->id], 'method' => 'POST', "class" => "d-sm-inline-block d-md-inline-block d-lg-inline-block d-xl-inline-block" ]) !!}
                                    {{ Form::hidden('_method', 'DELETE', ['class' => 'btn btn-danger']) }}
                                    {{ Form::submit('Видалити', ['class' => 'btn btn-danger']) }}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                    </table>
                </div>
                @else
                    <p>No patients</p>
                @endif
            </div>
        </div>
    </div>
@endsection
