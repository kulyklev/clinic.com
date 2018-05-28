@extends('layouts.app')

@section('content')
    @include('includes.messages')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                {!! Form::open(['action' => ['BloodTransfusionsController@store', 'patientID' => $patientID], 'method' => 'POST']) !!}

                <div class="form-group">
                    {{ Form::label('transfusionDate', 'Дата переливання') }}
                    {{ Form::date('transfusionDate', \Carbon\Carbon::now(), ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('volume', 'Об\'єм') }}
                    {{ Form::number('volume', null, ['class' => 'form-control']) }}
                </div>

                {{ Form::submit('Додати', ['class' => 'btn btn-primary btn-lg']) }}<br>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
