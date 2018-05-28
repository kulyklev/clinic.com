@extends('layouts.app')

@section('content')
    @include('includes.messages')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                {!! Form::open(['action' => ['FinalDiagnosisController@update', 'patientID' => $patientID, $finalDiagnosis->id], 'method' => 'POST']) !!}

                <div class="form-group">
                    {{ Form::label('dateOfTreatment', 'Дата зверення') }}
                    {{ Form::date('dateOfTreatment', \Carbon\Carbon::createFromFormat('Y-m-d', $finalDiagnosis->dateOfTreatment), ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('finalDiagnosis', 'Заключні(уточнені) діагнози') }}
                    {{ Form::text('finalDiagnosis', $finalDiagnosis->finalDiagnosis, ['class' => 'form-control']) }}
                </div>

                @if($finalDiagnosis->firstTimeDiagnosed == '1')
                    <div class="form-group">
                        {{ Form::label('gender', 'Вперше встановлений діагноз', ['class' => 'form-check-label']) }}
                        <div class="form-check form-check-inline">
                            {{ Form::radio('firstTimeDiagnosed', '1', true, ['class' => 'form-check-input', 'id' => 'firstTimeDiagnosedYesRadio']) }}
                            {{ Form::label('firstTimeDiagnosed', 'Так', ['class' => 'form-check-label']) }}
                        </div>

                        <div class="form-check form-check-inline">
                            {{ Form::radio('firstTimeDiagnosed', '0', false,['class' => 'form-check-input', 'id' => 'firstTimeDiagnosedNoRadio']) }}
                            {{ Form::label('firstTimeDiagnosed', 'Ні', ['class' => 'form-check-label']) }}
                        </div>
                    </div>
                @else
                    <div class="form-group">
                        {{ Form::label('gender', 'Вперше встановлений діагноз', ['class' => 'form-check-label']) }}
                        <div class="form-check form-check-inline">
                            {{ Form::radio('firstTimeDiagnosed', '1', false, ['class' => 'form-check-input', 'id' => 'firstTimeDiagnosedYesRadio']) }}
                            {{ Form::label('firstTimeDiagnosed', 'Так', ['class' => 'form-check-label']) }}
                        </div>

                        <div class="form-check form-check-inline">
                            {{ Form::radio('firstTimeDiagnosed', '0', true,['class' => 'form-check-input', 'id' => 'firstTimeDiagnosedNoRadio']) }}
                            {{ Form::label('firstTimeDiagnosed', 'Ні', ['class' => 'form-check-label']) }}
                        </div>
                    </div>
                @endif

                @if($finalDiagnosis->firstTimeDiagnosedOnProphylaxis == '1')
                    <div class="form-group">
                        {{ Form::label('gender', 'В т.ч. встановлений вперше при профогляді', ['class' => 'form-check-label']) }}
                        <div class="form-check form-check-inline">
                            {{ Form::radio('firstTimeDiagnosedOnProphylaxis', '1', true, ['class' => 'form-check-input', 'id' => 'firstTimeDiagnosedOnProphylaxisYesRadio']) }}
                            {{ Form::label('firstTimeDiagnosedOnProphylaxisYesRadio', 'Так', ['class' => 'form-check-label']) }}
                        </div>

                        <div class="form-check form-check-inline">
                            {{ Form::radio('firstTimeDiagnosedOnProphylaxis', '0', false,['class' => 'form-check-input', 'id' => 'firstTimeDiagnosedOnProphylaxisNoRadio']) }}
                            {{ Form::label('firstTimeDiagnosedOnProphylaxisNoRadio', 'Ні', ['class' => 'form-check-label']) }}
                        </div>
                    </div>
                @else
                    <div class="form-group">
                        {{ Form::label('gender', 'В т.ч. встановлений вперше при профогляді', ['class' => 'form-check-label']) }}
                        <div class="form-check form-check-inline">
                            {{ Form::radio('firstTimeDiagnosedOnProphylaxis', '1', false, ['class' => 'form-check-input', 'id' => 'firstTimeDiagnosedOnProphylaxisYesRadio']) }}
                            {{ Form::label('firstTimeDiagnosedOnProphylaxisYesRadio', 'Так', ['class' => 'form-check-label']) }}
                        </div>

                        <div class="form-check form-check-inline">
                            {{ Form::radio('firstTimeDiagnosedOnProphylaxis', '0', true,['class' => 'form-check-input', 'id' => 'firstTimeDiagnosedOnProphylaxisNoRadio']) }}
                            {{ Form::label('firstTimeDiagnosedOnProphylaxisNoRadio', 'Ні', ['class' => 'form-check-label']) }}
                        </div>
                    </div>
                @endif

                <div class="form-group">
                    {{ Form::label('doctor', 'Лікар') }}
                    {{ Form::text('doctor', $finalDiagnosis->doctor, ['class' => 'form-control']) }}
                </div>

                {{ Form::hidden('_method', 'PUT') }}
                {{ Form::submit('Оновити', ['class' => 'btn btn-primary btn-lg']) }}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
