@extends('layouts.admin')

@section('content')

    <h1>Create Destination</h1>

    <div class="row">

        {!! Form::open(['method'=>'POST', 'action'=>['AdminDestinationsController@store'], 'files'=>true]) !!}
        <div class="form-group">
            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('photo_id', 'Photo:') !!}
            {!! Form::file('photo_id', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Create Destination', ['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}

    </div>

    <div class="row">
        @include('includes.form_errors')
    </div>

@endsection