@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                @if(!Auth::guest() && Auth::user()->isDoctor)
                    <a href="{{ route('patient.drugIntolerance.create', ['patientID' => $patientID]) }}" class="btn btn-success">Додати нову непереносимість до ліків</a>
                    <a href="{{ route('patient.show', ['patientID' => $patientID]) }}" class="btn btn-success">Загальна інформація про пацієнта</a>
                @else
                    <a href="{{ route('patient.show', ['patientID' => $patientID]) }}" class="btn btn-success">Загальна інформація про пацієнта</a>
                @endif

                @if(count($drugList) >= 1)
                    <table class="table table-hover" style="width: 100%">
                        <thead class="thead-light">
                        <tr>
                            <th>Назва препарату</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($drugList as $drug)
                            <tr>
                                <td>{{ $drug->drugName }}</td>
                                @if(!Auth::guest() && Auth::user()->isDoctor)
                                    <td style="white-space: nowrap">
                                        <a href="{{ route('patient.drugIntolerance.edit', ['patientID' => $patientID, 'id' => $drug->id]) }}" class="btn btn-primary d-xs-inline-block d-sm-inline-block d-md-inline-block d-lg-inline-block d-xl-inline-block">Змінити</a>
                                        {!! Form::open(['action' => ['DrugIntoleranceController@destroy', $patientID, $drug->id], 'method' => 'POST', "class" => "d-sm-inline-block d-md-inline-block d-lg-inline-block d-xl-inline-block" ]) !!}
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
                        <p>This patient doesn`t have drug intolerance</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection