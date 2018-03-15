@extends('layouts.admin')

@section('content')

    <h1>Edit Tour</h1>

    <div class="row">
        
        <div class="col-sm-9">

            {!! Form::model($tour, ['method'=>'PATCH', 'action'=>['AdminToursController@update', $tour->id], 'files'=>true]) !!}
            <div class="form-group">
                {!! Form::label('title', 'Title:') !!}
                {!! Form::text('title', null, ['class' => 'form-control']) !!}
            </div>
			
			<div class="form-group">
            {!! Form::label('destination_id', 'Destination:') !!}
            {!! Form::select('destination_id',[''=>'Choose Options'] + $destinations, null, ['class' => 'form-control']) !!}
			</div>
			
			<div class="form-group">
            {!! Form::label('category_id', 'Category:') !!}
            {!! Form::select('category_id',[''=>'Choose Options'] + $categories, null, ['class' => 'form-control']) !!}
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
				{!! Form::label('Package', 'Package(Optional):') !!}
				{!! Form::text('package', null, ['class' => 'form-control']) !!}
			</div>
			
			<div class="form-group">
				{!! Form::label('body', 'Text:') !!}
				{!! Form::textarea('body', null, ['class' => 'form-control']) !!}
			</div>
			
			<div class="form-group">
				{!! Form::label('includes', 'Includes(Optional):') !!}
				{!! Form::textarea('includes', null, ['class' => 'form-control']) !!}
			</div>
			
            <div class="form-group">
                {!! Form::submit('Update Tour', ['class'=>'btn btn-primary col-sm-3']) !!}
            </div>
            {!! Form::close() !!}

            {!! Form::open(['method'=>'DELETE', 'action'=>['AdminToursController@destroy', $tour->id]]) !!}
            <div class="form-group">
                {!! Form::submit('Delete Tour', ['class'=>'btn btn-danger col-sm-3']) !!}
            </div>
            {!! Form::close() !!}

        </div>

    </div>

    <div class="row">
        @include('includes.form_errors')
    </div>

@endsection