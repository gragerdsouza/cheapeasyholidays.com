@extends('layouts.app')
@section('content')

	<div class="top_site_main" style="background-image:url(images/banner/top-heading.jpg);">
		<div class="banner-wrapper container article_heading">
					<div class="breadcrumbs-wrapper">
						<ul class="phys-breadcrumb">
							<li><a href="{{ route('home') }}" class="home">Home</a></li>
							<li>Holidays</li>
						</ul>
					</div>
					<h1 class="heading_primary">Holidays</h1>
		</div>
	</div>
	<section class="content-area">
		<div class="container">
			<div class="row">
				@if($tours)
				<div class="site-main col-sm-12">
					<ul class="tours products wrapper-tours-slider">
						@foreach($tours as $tour)
						<li class="item-tour col-md-3 col-sm-6 product">
							<div class="item_border item-product">
								<div class="post_images">
									<a href="{{ action('ToursController@show', $tour) }}">
										@if($tour->offer)
											<?php 
												$discount = $tour->price*$tour->offer/100;
												$total = $tour->price-$discount;
											?>
											<span class="price"><del>&pound;{{$tour->price}}</del>
												<ins>&pound;{{ number_format($total, 2) }}</ins>
											</span>	
											<span class="onsale">Offer!</span>
										@else
											<span class="price">&pound;{{$tour->price}}</span>
										@endif
										@foreach($tour->tourimages as $images)
											@if ($loop->first)
												<img width="430" height="305" src="{{$images->file}}" alt="{{$tour->title}}" title="{{$tour->title}}">
											@else
												@break
											@endif
										@endforeach
									</a>
								</div>
								<div class="wrapper_content">
									<div class="post_title"><h4>
										<a href="{{ action('ToursController@show', $tour) }}" rel="bookmark">{{str_limit($tour->title, 28)}}</a>
									</h4></div>
									@if($tour->package)
										<span class="post_date">{{$tour->package}}</span>
									@else
										<span class="post_date" style="visibility: hidden;"></span>
									@endif
									<div class="description">
										<p>{{str_limit($tour->body, 90)}}</p>
									</div>
								</div>
								<div class="read_more">
									<div class="item_rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-o"></i>
									</div>
									<a rel="nofollow" href="{{ action('ToursController@show', $tour) }}" class="button product_type_tour_phys add_to_cart_button">Read more</a>
								</div>
							</div>
						</li>
						@endforeach
					</ul>
					<div class="navigation paging-navigation" role="navigation">
						<ul class="page-numbers">
						{{ $tours->links() }}
						</ul>
					</div>
				</div>
				@endif
			</div>
		</div>
	</section>

@endsection	