@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <a href="{{ route('patient.allergicHistories.create', ['patientID' => $patientID]) }}" class="btn btn-success">Зареєструвати алергію</a>
                <a href="{{ route('patient.show', ['patientID' => $patientID]) }}" class="btn btn-success">Загальна інформаця про пацієнта</a>

                @if(count($allergiesList) >= 1)
                    <table class="table table-hover" style="width: 100%">
                        <thead class="thead-light">
                        <tr>
                            <th>Назва алергії</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($allergiesList as $allergy)
                            <tr>
                                <td>{{ $allergy->allergyName }}</td>

                                <td style="white-space: nowrap">
                                    <a href="{{ route('patient.allergicHistories.edit', ['patientID' => $patientID, 'id' => $allergy->id]) }}" class="btn btn-primary d-xs-inline-block d-sm-inline-block d-md-inline-block d-lg-inline-block d-xl-inline-block">Змінити</a>
                                    {!! Form::open(['action' => ['AllergicHistoryController@destroy', $patientID, $allergy->id], 'method' => 'POST', "class" => "d-sm-inline-block d-md-inline-block d-lg-inline-block d-xl-inline-block" ]) !!}
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
                        <p>This patient doesn`t have allergies</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection