@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                @if(!Auth::guest() && Auth::user()->isDoctor)
                    <a href="{{ route('patient.diaryRecords.create', ['patientID' => $patientID]) }}" class="btn btn-success">Новий запис</a>
                    <a href="{{ route('patient.show', ['patientID' => $patientID]) }}" class="btn btn-success">Загальна інформація про пацієнта</a>
                @else
                    <a href="{{ route('patient.show', ['patientID' => $patientID]) }}" class="btn btn-success">Загальна інформація</a>
                @endif

                @if(count($diary) >= 1)
                    <table class="table table-hover" style="width: 100%">
                        <thead class="thead-light">
                        <tr>
                            <th>Дата звернення</th>
                            <th>Місце проведення лікування</th>
                            <th>Скарги хворого, об’єктивні дані, діагноз, перебіг хвороби</th>
                            <th>Призначення</th>
                            <th>Лікар</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($diary as $record)
                            <tr>
                                <td>{{ $record->appealDate }}</td>
                                <td>{{ $record->placeOfTreatment }}</td>
                                <td>{{ $record->treatmentData }}</td>
                                <td>{{ $record->treatment }}</td>
                                <td>{{ $record->doctor }}</td>
                                @if(!Auth::guest() && Auth::user()->isDoctor)
                                    <td style="white-space: nowrap">
                                        <a href="{{ route('patient.diaryRecords.edit', ['patientID' => $patientID, 'id' => $record->id]) }}" class="btn btn-primary d-xs-inline-block d-sm-inline-block d-md-inline-block d-lg-inline-block d-xl-inline-block">Змінити</a>
                                        {!! Form::open(['action' => ['DiaryRecordsController@destroy', $patientID, $record->id], 'method' => 'POST', "class" => "d-sm-inline-block d-md-inline-block d-lg-inline-block d-xl-inline-block" ]) !!}
                                        {{ Form::hidden('_method', 'DELETE', ['class' => 'btn btn-danger']) }}
                                        {{ Form::submit('Видалити', ['class' => 'btn btn-danger']) }}
                                        {!! Form::close() !!}
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="alert alert-primary" role="alert">
                        <p>This patient doesn`t have records in his diary</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection