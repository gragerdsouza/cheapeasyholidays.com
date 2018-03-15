@extends('layouts.admin')

@section('content')

    <h1>Create Tours</h1>

    <div class="row">

        {!! Form::open(['method'=>'POST', 'action'=>['AdminToursController@store'], 'files'=>true]) !!}
        <div class="form-group">
            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title', null, ['class' => 'form-control']) !!}
        </div>
		
		<div class="form-group">
            {!! Form::label('destination_id', 'Destination:') !!}
            {!! Form::select('destination_id',[''=>'Choose Options'] + $destinations, ['class' => 'form-control']) !!}
        </div>
		
		<div class="form-group">
            {!! Form::label('category_id', 'Category:') !!}
            {!! Form::select('category_id',[''=>'Choose Options'] + $categories, ['class' => 'form-control']) !!}
        </div>
		
		<div class="form-group">
            {!! Form::label('Price', 'Price in GBP:') !!}
            {!! Form::text('price', null, ['class' => 'form-control']) !!}
        </div>
		
		<div class="form-group">
            {!! Form::label('Offer', 'Offer in %(Optional):') !!}
            {!! Form::text('offer', null, ['class' => 'form-control']) !!}
        </div>
		
		<div class="form-group">
            {!! Form::label('Package', 'Package (Optional):') !!}
            {!! Form::text('package', null, ['class' => 'form-control']) !!}
        </div>
		
		<div class="form-group">
            {!! Form::label('body', 'Text:') !!}
            {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
        </div>
		
		<div class="form-group">
            {!! Form::label('includes', 'Includes:') !!}
            {!! Form::textarea('includes', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('Images', 'Images:') !!}
			{!! Form::file('myfile[]', ['multiple' => 'multiple'])!!}
        </div>

        <div class="form-group">
            {!! Form::submit('Create Tours', ['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}

    </div>

    <div class="row">
        @include('includes.form_errors')
    </div>

@endsection