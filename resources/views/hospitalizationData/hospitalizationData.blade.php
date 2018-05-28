@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <a href="{{ route('patient.hospitalizationData.create', ['patientID' => $patientID]) }}" class="btn btn-success">Нова госпіталізація</a>
                <a href="{{ route('patient.show', ['patientID' => $patientID]) }}" class="btn btn-success">Загальна інформаця про пацієнта</a>

                @if(count($hospitalizationData) >= 1)
                    <table class="table-hover" style="width: 100%">
                        <thead class="thead-light">
                        <tr>
                            <th>Дата госпіталізації</th>
                            <th>Назва лікувального закладу</th>
                            <th>Відділення</th>
                            <th>Заключний діагноз</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($hospitalizationData as $data)
                            <tr>
                                <td>{{ $data->hospitalizationDate }}</td>
                                <td>{{ $data->medicalFacilityName }}</td>
                                <td>{{ $data->departmentName }}</td>
                                <td>{{ $data->finalDiagnosis }}</td>
                                <td style="white-space: nowrap">
                                    <a href="{{ route('patient.hospitalizationData.edit', ['patientID' => $patientID, 'id' => $data->id]) }}" class="btn btn-primary d-xs-inline-block d-sm-inline-block d-md-inline-block d-lg-inline-block d-xl-inline-block">Змінити</a>
                                    {!! Form::open(['action' => ['HospitalizationDataController@destroy', $patientID, $data->id], 'method' => 'POST', "class" => "d-sm-inline-block d-md-inline-block d-lg-inline-block d-xl-inline-block" ]) !!}
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
                        <p>This patient doesn`t have hospitalizations {{ $patientID }}</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

