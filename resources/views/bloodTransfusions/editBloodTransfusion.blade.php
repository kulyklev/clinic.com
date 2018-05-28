@extends('layouts.app')

@section('content')
    @include('includes.messages')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                {!! Form::open(['action' => ['BloodTransfusionsController@update', 'patientID' => $patientID, 'id' => $bloodTransfusion->id], 'method' => 'POST']) !!}

                <div class="form-group">
                    {{ Form::label('transfusionDate', 'Дата переливання') }}
                    {{ Form::date('transfusionDate', \Carbon\Carbon::createFromFormat('Y-m-d', $bloodTransfusion->transfusionDate), ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('volume', 'Об\'єм') }}
                    {{ Form::number('volume', $bloodTransfusion->volume, ['class' => 'form-control']) }}
                </div>

                {{ Form::hidden('_method', 'PUT') }}
                {{ Form::submit('Оновити', ['class' => 'btn btn-primary btn-lg']) }}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection