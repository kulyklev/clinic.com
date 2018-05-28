@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <a href="{{ route('patient.vaccination.create', ['patientID' => $patientID]) }}" class="btn btn-success">Нова вакцінація</a>
                <a href="{{ route('patient.show', ['patientID' => $patientID]) }}" class="btn btn-success">Загальна інформаця про пацієнта</a>

                @if(count($vaccinationData) >= 1)
                    <table class="table table-hover" style="width: 100%">
                        <thead class="thead-light">
                        <tr>
                            <th>Найменування щеплення</th>
                            <th>Тип щеплення</th>
                            <th>Дата</th>
                            <th>Вік</th>
                            <th>Доза</th>
                            <th>Серія</th>
                            <th>Назва препарату</th>
                            <th>Спосіб введення</th>
                            <th>Місцева реакція на щеплення</th>
                            <th>Загальна реакція на щеплення</th>
                            <th>Медичні протипоказання</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($vaccinationData as $vaccinationDatum)
                            <tr>
                                <td>{{ $vaccinationDatum->vaccinationName }}</td>
                                <td>{{ $vaccinationDatum->vaccinationType }}</td>
                                <td>{{ $vaccinationDatum->vaccinationDate }}</td>
                                <td>{{ $vaccinationDatum->age }}</td>
                                <td>{{ $vaccinationDatum->dose }}</td>
                                <td>{{ $vaccinationDatum->series }}</td>
                                <td>{{ $vaccinationDatum->nameOfTheDrug }}</td>
                                <td>{{ $vaccinationDatum->methodOfInput }}</td>
                                <td>{{ $vaccinationDatum->localReaction }}</td>
                                <td>{{ $vaccinationDatum->globalReaction }}</td>
                                <td>{{ $vaccinationDatum->medicalContraindications }}</td>
                                <td style="white-space: nowrap">
                                    <a href="{{ route('patient.vaccination.edit', ['patientID' => $patientID, 'id' => $vaccinationDatum->id]) }}" class="btn btn-primary d-xs-inline-block d-sm-inline-block d-md-inline-block d-lg-inline-block d-xl-inline-block">Змінити</a>
                                    {!! Form::open(['action' => ['VaccinationController@destroy', $patientID, $vaccinationDatum->id], 'method' => 'POST', "class" => "d-sm-inline-block d-md-inline-block d-lg-inline-block d-xl-inline-block" ]) !!}
                                    {{ Form::hidden('_method', 'DELETE', ['class' => 'btn btn-danger']) }}
                                    {{ Form::submit('Видалити', ['class' => 'btn btn-danger']) }}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="alert alert-primary" role="alert">
                        <p>This patient doesn`t have vaccinations</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
