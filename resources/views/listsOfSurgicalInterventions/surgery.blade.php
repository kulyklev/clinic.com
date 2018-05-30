@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <a href="{{ route('patient.surgicalInterventions.create', ['patientID' => $patientID]) }}" class="btn btn-success">Зареєструвати опрацію</a>
                <a href="{{ route('patient.show', ['patientID' => $patientID]) }}" class="btn btn-success">Загальна інформаця про пацієнта</a>

                @if(count($surgeryList) >= 1)
                    <table class="table table-hover" style="width: 100%">
                        <thead class="thead-light">
                        <tr>
                            <th>Назва операції</th>
                            <th>Дата проведення</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($surgeryList as $surgery)
                            <tr>
                                <td>{{ $surgery->operationName }}</td>
                                <td>{{ $surgery->operationDate }}</td>

                                <td style="white-space: nowrap">
                                    <a href="{{ route('patient.surgicalInterventions.edit', ['patientID' => $patientID, 'id' => $surgery->id]) }}" class="btn btn-primary d-xs-inline-block d-sm-inline-block d-md-inline-block d-lg-inline-block d-xl-inline-block">Змінити</a>
                                    {!! Form::open(['action' => ['SurgicalInterventionsController@destroy', $patientID, $surgery->id], 'method' => 'POST', "class" => "d-sm-inline-block d-md-inline-block d-lg-inline-block d-xl-inline-block" ]) !!}
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
                        <p>This patient doesn`t have surgeries</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection