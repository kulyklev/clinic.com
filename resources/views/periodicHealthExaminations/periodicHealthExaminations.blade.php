@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <a href="{{ route('patient.periodicHealthExaminations.create', ['patientID' => $patientID]) }}" class="btn btn-success">Новий запис</a>
                <a href="{{ route('patient.show', ['patientID' => $patientID]) }}" class="btn btn-success">Загальна інформаця про пацієнта</a>

                @if(count($periodicHealthExaminations) >= 1)
                    <table class="table-hover" style="width: 100%">
                        <thead class="thead-light">
                        <tr>
                            <th>Найменування обстеження</th>
                            <th>Номер кабінету</th>
                            <th>Рік і дата проведення</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($periodicHealthExaminations as $healthExamination)
                            <tr>
                                <td>{{ $healthExamination->nameOfExamination }}</td>
                                <td>{{ $healthExamination->cabinetNumber }}</td>
                                <td>{{ $healthExamination->dateOfExamination }}</td>
                                <td style="white-space: nowrap">
                                    <a href="{{ route('patient.periodicHealthExaminations.edit', ['patientID' => $patientID, 'id' => $healthExamination->id]) }}" class="btn btn-primary d-xs-inline-block d-sm-inline-block d-md-inline-block d-lg-inline-block d-xl-inline-block">Змінити</a>
                                    {!! Form::open(['action' => ['PeriodicHealthExaminationController@destroy', $patientID, $healthExamination->id], 'method' => 'POST', "class" => "d-sm-inline-block d-md-inline-block d-lg-inline-block d-xl-inline-block" ]) !!}
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
                        <p>This patient doesn`t have periodic health examinations</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection