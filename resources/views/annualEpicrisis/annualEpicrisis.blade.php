@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <a href="{{ route('patient.annualEpicrisis.create', ['patientID' => $patientID]) }}" class="btn btn-success">Новий епікриз</a>
                <a href="{{ route('patient.show', ['patientID' => $patientID]) }}" class="btn btn-success">Загальна інформаця про пацієнта</a>

                @if(count($epicrisisAnnual) >= 1)
                    <table class="table table-hover" style="width: 100%">
                        <thead class="thead-light">
                        <tr>
                            <th>Дата</th>
                            <th>Спостерігається з приводу (вказати захворювання)</th>
                            <th>Діагноз основний</th>
                            <th>Супутні</th>
                            <th>Кількість загострень протягом року</th>
                            <th>Проведення лікування</th>
                            <th>Група інвалідності</th>
                            <th>Санаторно-курортне лікування</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($epicrisisAnnual as $epicrisis)
                            <tr>
                                <td>{{ $epicrisis->epicrisisDate }}</td>
                                <td>{{ $epicrisis->causeOfObservation }}</td>
                                <td>{{ $epicrisis->mainDiagnosis }}</td>
                                <td>{{ $epicrisis->concomitantDiagnoses }}</td>
                                <td>{{ $epicrisis->numberOfAggravations }}</td>
                                <td>{{ $epicrisis->carryingOutTreatment }}</td>
                                <td>{{ $epicrisis->disabilityGroup }}</td>
                                <td>{{ $epicrisis->sanatoriumAndSpaTreatment }}</td>
                                <td style="white-space: nowrap">
                                    <a href="{{ route('patient.annualEpicrisis.edit', ['patientID' => $patientID, 'id' => $epicrisis->id]) }}" class="btn btn-primary d-xs-inline-block d-sm-inline-block d-md-inline-block d-lg-inline-block d-xl-inline-block">Змінити</a>
                                    {!! Form::open(['action' => ['EpicrisisAnnualController@destroy', $patientID, $epicrisis->id], 'method' => 'POST', "class" => "d-sm-inline-block d-md-inline-block d-lg-inline-block d-xl-inline-block" ]) !!}
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
                        <p>This patient doesn`t have epicrisis</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
