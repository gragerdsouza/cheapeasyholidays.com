@extends('layouts.admin')

@section('content')

    <h1>Edit Destination</h1>

    <div class="row">

        <div class="col-sm-3">
            <img src="{{$path}}{{$destination->photo->file}}" alt="" class="img-responsive">
        </div>
        
        <div class="col-sm-9">

            {!! Form::model($destination, ['method'=>'PATCH', 'action'=>['AdminDestinationsController@update', $destination->id], 'files'=>true]) !!}
            <div class="form-group">
                {!! Form::label('title', 'Title:') !!}
                {!! Form::text('title', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('photo_id', 'Photo:') !!}
                {!! Form::file('photo_id', null, ['class' => 'form-control']) !!}
            </div>
			
            <div class="form-group">
                {!! Form::submit('Update Destination', ['class'=>'btn btn-primary col-sm-3']) !!}
            </div>
            {!! Form::close() !!}

            {!! Form::open(['method'=>'DELETE', 'action'=>['AdminDestinationsController@destroy', $destination->id]]) !!}
            <div class="form-group">
                {!! Form::submit('Delete Destination', ['class'=>'btn btn-danger col-sm-3']) !!}
            </div>
            {!! Form::close() !!}

        </div>

    </div>

    <div class="row">
        @include('includes.form_errors')
    </div>

@endsection