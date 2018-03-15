@extends('layouts.app')
@section('styles')
	<link rel="stylesheet" href="{{ asset('css/booking.css') }}" type="text/css" media="all">
	<link rel="stylesheet" href="{{ asset('css/swipebox.min.css') }}" type="text/css" media="all">
@endsection

@section('content')
	<div class="top_site_main" style="background-image:url({{ config('app.url') }}images/banner/top-heading.jpg);">
			<div class="banner-wrapper container article_heading">
				<div class="breadcrumbs-wrapper">
					<ul class="phys-breadcrumb">
						<li><a href="{{ route('home') }}" class="home">Home</a></li>
						<li><a href="{{ route('tours') }}">Tours</a></li>
						<li>{{$tours->title}}</li>
					</ul>
				</div>
				<h2 class="heading_primary">{{$tours->title}}</h2>
			</div>
		</div>
		<section class="content-area single-woo-tour">
			<div class="container">
				<div class="tb_single_tour product">
					<div class="top_content_single row">
						<div class="images images_single_left">
							<div class="title-single">
								<div class="title">
									<h1>{{$tours->title}}</h1>
								</div>
							</div>
							<div class="tour_after_title">
								<div class="meta_date">
									<span>{{$tours->package}}</span>
								</div>
							</div>
							@if($tours_image)	
							<div id="slider" class="flexslider">
								<ul class="slides">
									@foreach($tours_image as $images)
									<li>
										<a href="{{$images->file}}" class="swipebox" title=""><img width="950" height="700" src="{{$images->file}}" class="attachment-shop_single size-shop_single wp-post-image" alt="" title="" draggable="false"></a>
									</li>
									@endforeach
								</ul>
							</div>
							<div id="carousel" class="flexslider thumbnail_product">
								<ul class="slides">
									@foreach($tours_image as $images)
									<li>
										<img width="150" height="100" src="{{$images->file}}" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" alt="" title="" draggable="false">
									</li>
									@endforeach
								</ul>
							</div>
							@endif
							<div class="clear"></div>
							<div class="single-tour-tabs wc-tabs-wrapper">
								<ul class="tabs wc-tabs" role="tablist">
									<li class="description_tab active" role="presentation">
										<a href="#tab-description" role="tab" data-toggle="tab">Description</a>
									</li>
									<li class="location_tab_tab" role="presentation">
										<a href="#tab-location_tab" role="tab" data-toggle="tab">Location</a>
									</li>
								</ul>
								<div class="tab-content">
									<div role="tabpanel" class="tab-pane single-tour-tabs-panel single-tour-tabs-panel--description panel entry-content wc-tab active" id="tab-description">
										<h2>Product Description</h2>
										<p>{{$tours->body}}</p>
									</div>
									</div>
								</div>
							</div>
						</div>
						<div class="summary entry-summary description_single">
							<div class="affix-sidebar">
								<div class="entry-content-tour">
									<p class="price">
										<span class="text">Price:</span><span class="travel_tour-Price-amount amount">&pound;{{$tours->price}}</span>
									</p>
									<div class="clear"></div>
									<div class="custom_from">
										<div role="form" class="wpcf7" lang="en-US" dir="ltr">
											<div class="screen-reader-response"></div>
											<form action="#" method="post" class="wpcf7-form" novalidate="novalidate">

												<p>Fill up the form below to tell us what you're looking for</p>
												<p>
													<span class="wpcf7-form-control-wrap your-name">
														<input type="text" name="your-name" value="" size="40" class="wpcf7-form-control" aria-invalid="false" placeholder="Your name*">
													</span>
												</p>
												<p>
													<span class="wpcf7-form-control-wrap your-email">
														<input type="email" name="your-email" value="" size="40" class="wpcf7-form-control" aria-invalid="false" placeholder="Email*">
													</span>
												</p>
												<p>
													<span class="wpcf7-form-control-wrap your-message">
														<textarea name="your-message" cols="40" rows="10" class="wpcf7-form-control" aria-invalid="false" placeholder="Message"></textarea>
													</span>
												</p>
												<p>
													<input type="submit" value="Send Enquiry" class="wpcf7-form-control wpcf7-submit"><span class="ajax-loader"></span>
												</p>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
@endsection	

@section('scripts')
	<script src="{{ asset('js/jquery.swipebox.min.js') }}"></script>
@endsection