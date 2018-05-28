@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <a href="{{ route('patient.bloodTransfusions.create', ['patientID' => $patientID]) }}" class="btn btn-success">Нове переливання</a>
                <a href="{{ route('patient.show', ['patientID' => $patientID]) }}" class="btn btn-success">Загальна інформаця про пацієнта</a>

                @if(count($bloodTransfusions) >= 1)
                    <table class="table-hover" style="width: 100%">
                        <thead class="thead-light">
                            <tr>
                                <th>Код переливання</th>
                                <th>Дата переливання</th>
                                <th>Об'єм</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bloodTransfusions as $bloodTransfusion)
                                <tr>
                                    <td>{{ $bloodTransfusion->id }}</td>
                                    <td>{{ $bloodTransfusion->transfusionDate }}</td>
                                    <td>{{ $bloodTransfusion->volume }}</td>
                                    <td style="white-space: nowrap">
                                        <a href="{{ route('patient.bloodTransfusions.edit', ['patientID' => $patientID, 'id' => $bloodTransfusion->id]) }}" class="btn btn-primary d-xs-inline-block d-sm-inline-block d-md-inline-block d-lg-inline-block d-xl-inline-block">Змінити</a>
                                        {!! Form::open(['action' => ['BloodTransfusionsController@destroy', $patientID, $bloodTransfusion->id], 'method' => 'POST', "class" => "d-sm-inline-block d-md-inline-block d-lg-inline-block d-xl-inline-block" ]) !!}
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
                        <p>This patient doesn`t have blood transfusions</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
