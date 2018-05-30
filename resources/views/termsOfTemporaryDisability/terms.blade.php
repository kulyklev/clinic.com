@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                @if(!Auth::guest() && Auth::user()->isDoctor)
                    <a href="{{ route('patient.termsOfTemporaryDisability.create', ['patientID' => $patientID]) }}" class="btn btn-success">Новий строк тимчасовой нерпацездатності</a>
                    <a href="{{ route('patient.show', ['patientID' => $patientID]) }}" class="btn btn-success">Загальна інформація про пацієнта</a>
                @else
                    <a href="{{ route('patient.show', ['patientID' => $patientID]) }}" class="btn btn-success">Загальна інформація про пацієнта</a>
                @endif

                @if(count($termsOfTemporaryDisability) >= 1)
                    <table class="table table-hover" style="width: 100%">
                        <thead class="thead-light">
                        <tr>
                            <th>№ листка непрацездатності</th>
                            <th>Дата видачі листка непрацездатності</th>
                            <th>Дата закриття</th>
                            <th>Заключний діагноз</th>
                            <th>Лікар</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($termsOfTemporaryDisability as $term)
                            <tr>
                                <td>{{ $term->id }}</td>
                                <td>{{ $term->openingDate }}</td>
                                <td>{{ $term->closingDate }}</td>
                                <td>{{ $term->finalDiagnosis }}</td>
                                <td>{{ $term->doctor }}</td>
                                @if(!Auth::guest() && Auth::user()->isDoctor)
                                    <td style="white-space: nowrap">
                                        <a href="{{ route('patient.termsOfTemporaryDisability.edit', ['patientID' => $patientID, 'id' => $term->id]) }}" class="btn btn-primary d-xs-inline-block d-sm-inline-block d-md-inline-block d-lg-inline-block d-xl-inline-block">Змінити</a>
                                        {!! Form::open(['action' => ['TermsOfTemporaryDisabilityController@destroy', $patientID, $term->id], 'method' => 'POST', "class" => "d-sm-inline-block d-md-inline-block d-lg-inline-block d-xl-inline-block" ]) !!}
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
                        <p>This patient doesn`t have terms of temporary disability</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
