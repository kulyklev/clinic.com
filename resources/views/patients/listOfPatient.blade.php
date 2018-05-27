@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">{{--TODO Change class panel panel-default--}}

                    <a href="{{route("patient.create")}}" class="btn btn-success">Додати пацієнта</a>

                    @if(count($patients) >= 1)
                        <table class="table table-hover" style="width:100%">
                            <thead class="thead-light">
                            <tr>
                                <th>Код хворого</th>
                                <th>Ім'я</th>
                                <th>Прізвище</th>
                                <th>По батькові</th>
                                <th>День народження</th>
                                <th>Диспансерна група</th>
                                <th></th>
                            </tr>
                            </thead>

                        @foreach($patients as $patient)
                                <tr>
                                    <td>{{ $patient->id }}</td>
                                    <td>{{ $patient->name }}</td>
                                    <td>{{ $patient->surname }}</td>
                                    <td>{{ $patient->patronymic }}</td>
                                    <td>{{ $patient->bdate }}</td>
                                    <td>{{ $patient->dispensaryGroup }}</td>
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
                    @else
                        <div class="alert alert-primary" role="alert">
                            There are no patients.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
