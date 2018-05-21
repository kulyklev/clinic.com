@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <table class="table-striped" style="width:100%">
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

                @if(count($patients) >= 1)
                    @foreach($patients as $patient)
                        <tr>
                            <a href="/patients/{{$patient->id}}">
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
                            </a>
                            <td>
                                {!! Form::open(['action' => ['PatientsController@destroy', $patient->id], 'method' => 'POST']) !!}
                                    {{ Form::hidden('_method', 'DELETE', ['class' => 'btn btn-danger']) }}
                                    {{ Form::submit('Удалить') }}
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
