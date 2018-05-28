@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <a href="{{ route('patient.finalDiagnosis.create', ['patientID' => $patientID]) }}" class="btn btn-success">Новий запис</a>
                <a href="{{ route('patient.show', ['patientID' => $patientID]) }}" class="btn btn-success">Загальна інформаця про пацієнта</a>

                @if(count($finalDiagnosis) >= 1)
                    <table class="table-hover" style="width: 100%">
                        <thead class="thead-light">
                        <tr>
                            <th>Дата звернення</th>
                            <th>Заключні(уточнені) діагнози</th>
                            <th>Вперше встановлений діагноз</th>
                            <th>В т.ч. встановлений вперше припрофогляді</th>
                            <th>Лікар</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($finalDiagnosis as $diagnosis)
                            <tr>
                                <td>{{ $diagnosis->dateOfTreatment }}</td>
                                <td>{{ $diagnosis->finalDiagnosis }}</td>
                                <td>{{ $diagnosis->firstTimeDiagnosed }}</td>
                                <td>{{ $diagnosis->firstTimeDiagnosedOnProphylaxis }}</td>
                                <td>{{ $diagnosis->doctor }}</td>
                                <td style="white-space: nowrap">
                                    <a href="{{ route('patient.finalDiagnosis.edit', ['patientID' => $patientID, 'id' => $diagnosis->id]) }}" class="btn btn-primary d-xs-inline-block d-sm-inline-block d-md-inline-block d-lg-inline-block d-xl-inline-block">Змінити</a>
                                    {!! Form::open(['action' => ['FinalDiagnosisController@destroy', $diagnosis->id, $patientID], 'method' => 'POST', "class" => "d-sm-inline-block d-md-inline-block d-lg-inline-block d-xl-inline-block" ]) !!}
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
                        <p>This patient doesn`t have final diagnosis</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection