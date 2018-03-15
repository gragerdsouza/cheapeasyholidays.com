@extends('layouts.app')
@section('content')
<div class="wrapper-bg-video">
				<video poster="images/video_slider.jpg" playsinline autoplay muted loop>
					<source src="http://physcode.com/video/330149744.mp4" type="video/mp4">
				</video>
				<div class="content-slider">
					<p>Find your special tour today </p>
					<h2>With VFM City Trips </h2>
					<p><a href="{{ route('holidays') }}" class="btn btn-slider">VIEW HOLIDAYS </a></p>
				</div>
			</div>
<div class="container two-column-respon mg-top-6x mg-bt-6x">
				<div class="row">
					<div class="col-sm-12 mg-btn-6x">
						<div class="shortcode_title title-center title-decoration-bottom-center">
							<h3 class="title_primary">WHY CHOOSE US?</h3><span class="line_after_title"></span>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="wpb_column col-sm-3">
						<div class="widget-icon-box widget-icon-box-base iconbox-center">
							<div class="boxes-icon circle" style="font-size:30px;width:80px; height:80px;line-height:80px">
								<span class="inner-icon"><i class="fa fa-heart"></i></span>
							</div>
							<div class="content-inner">
								<div class="sc-heading article_heading">
									<h4 class="heading__primary">Trusted Travel Expert</h4></div>
								<div class="desc-icon-box">
									<div>We live and love travel.</div>
								</div>
							</div>
						</div>
					</div>
					<div class="wpb_column col-sm-3">
						<div class="widget-icon-box widget-icon-box-base iconbox-center">
							<div class="boxes-icon " style="font-size:30px;width:80px; height:80px;line-height:80px">
								<span class="inner-icon"><i class="fa fa-gbp"></i></span>
							</div>
							<div class="content-inner">
								<div class="sc-heading article_heading">
									<h4 class="heading__primary">Price Promise</h4></div>
								<div class="desc-icon-box">
									<div>Best price and value for money.</div>
								</div>
							</div>
						</div>
					</div>
					<div class="wpb_column col-sm-3">
						<div class="widget-icon-box widget-icon-box-base iconbox-center">
							<div class="boxes-icon " style="font-size:30px;width:80px; height:80px;line-height:80px">
								<span class="inner-icon"><i class="fa fa-shield"></i></span>
							</div>
							<div class="content-inner">
								<div class="sc-heading article_heading">
									<h4 class="heading__primary">Peace of mind</h4></div>
								<div class="desc-icon-box">
									<div>ABTA & ATOL protected.</div>
								</div>
							</div>
						</div>
					</div>
					<div class="wpb_column col-sm-3">
						<div class="widget-icon-box widget-icon-box-base iconbox-center">
							<div class="boxes-icon circle" style="font-size:30px;width:80px; height:80px;line-height:80px">
								<span class="inner-icon"><i class="fa fa-"></i></span>
							</div>
							<div class="content-inner">
								<div class="sc-heading article_heading">
									<h4 class="heading__primary">Over 22 Years Experience</h4></div>
								<div class="desc-icon-box">
									<div>Human touch makes all the difference.</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="padding-top-6x padding-bottom-6x section-background" style="background-image:url(images/home/bg-popular.jpg)">
				<div class="container">
					<div class="shortcode_title text-white title-center title-decoration-bottom-center">
						<div class="title_subtitle">Take a Look at Our</div>
						<h3 class="title_primary">MOST POPULAR TOURS</h3>
						<span class="line_after_title" style="color:#ffffff"></span>
					</div>
					@if($popular_tours)
					<div class="row wrapper-tours-slider">
						<div class="tours-type-slider list_content" data-dots="true" data-nav="true" data-responsive='{"0":{"items":1}, "480":{"items":2}, "768":{"items":2}, "992":{"items":3}, "1200":{"items":4}}'>
							@foreach($popular_tours as $popular_tour)
							<div class="item-tour">
								<div class="item_border">
									<div class="item_content">
										<div class="post_images">
											@if($popular_tour->offer)
											<?php 
												$discount = $popular_tour->price*$popular_tour->offer/100;
												$total = $popular_tour->price-$discount;
											?>

											<a href="{{ action('ToursController@show', $popular_tour) }}" class="travel_tour-LoopProduct-link">
											<span class="price"><del>
												<span class="travel_tour-Price-amount amount">&pound;{{$popular_tour->price}}</span></del>
												<ins><span class="travel_tour-Price-amount amount">&pound;{{ number_format($total, 2) }}</span></ins>
											</span>
												<span class="onsale">Offer!</span>
											@else
												<span class="price">
													<span class="travel_tour-Price-amount amount">&pound;{{ $popular_tour->price }}</span>
												</span>
											@endif
											@foreach($popular_tour->image as $images)
											@if ($loop->first)
												<img src="{{$images->file ? $images->file : 'http://www.hutterites.org/wp-content/uploads/2012/03/placeholder.jpg'}}" alt="{{$popular_tour->title}}" title="{{$popular_tour->title}}">
											@else
												@break
											@endif
											@endforeach
												
											</a>
										</div>
										<div class="wrapper_content">
											<div class="post_title"><h4>
												<a href="{{ action('ToursController@show', $popular_tour) }}" rel="bookmark">{{str_limit($popular_tour->title, 23)}}</a>
											</h4></div>
											@if($popular_tour->package)
												<span class="post_date">{{$popular_tour->package}}</span>
											@else
												<span class="post_date" style="visibility: hidden;"></span>
											@endif
											<p>{{str_limit($popular_tour->body, 90)}}</p>
										</div>
									</div>
									<div class="read_more">
										<div class="item_rating">
											<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
										</div>
										<a href="{{ action('ToursController@show', $popular_tour) }}" class="read_more_button">VIEW MORE
											<i class="fa fa-long-arrow-right"></i></a>
										<div class="clear"></div>
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div>
					@endif
				</div>
			</div>
			@if($destinations)
			<div class="section-white padding-top-6x padding-bottom-6x tours-type">
				<div class="container">
					<div class="shortcode_title title-center title-decoration-bottom-center">
						<div class="title_subtitle">Find a Tour by</div>
						<h3 class="title_primary">DESTINATION</h3><span class="line_after_title"></span>
					</div>
					<div class="wrapper-tours-slider wrapper-tours-type-slider">
						<div class="tours-type-slider" data-dots="true" data-nav="true" data-responsive='{"0":{"items":1}, "480":{"items":2}, "768":{"items":3}, "992":{"items":4}, "1200":{"items":5}}'>
							@foreach($destinations as $destination)
							<div class="tours_type_item">
								<a href="" class="tours-type__item__image">
									<img src="{{$destination->photo->file ? $destination->photo->file : 'http://www.hutterites.org/wp-content/uploads/2012/03/placeholder.jpg'}}" alt="{{$destination->title}}">
								</a>
								<div class="content-item">
									<div class="item__title">{{$destination->title}}</div>
								</div>
							</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>
			@endif
			<div class="padding-top-6x padding-bottom-6x section-background" style="background-image:url(images/home/bg-pallarax.jpg)">
				<div class="container">
					<div class="shortcode_title title-center title-decoration-bottom-center">
						<h3 class="title_primary">DEALS AND DISCOUNTS</h3><span class="line_after_title"></span>
					</div>
					@if($deal_and_discounts)
					<div class="row wrapper-tours-slider">
						<div class="tours-type-slider list_content" data-dots="true" data-nav="true" data-responsive='{"0":{"items":1}, "480":{"items":2}, "768":{"items":3}, "992":{"items":3}, "1200":{"items":3}}'>
							@foreach($deal_and_discounts as $deal_and_discount)
							<div class="item-tour">
								<div class="item_border">
									<div class="item_content">
										<div class="post_images">
											@if($deal_and_discount->offer)
											<?php 
												$discount = $deal_and_discount->price*$deal_and_discount->offer/100;
												$total = $deal_and_discount->price-$discount;
											?>

											<a href="{{ action('ToursController@show', $deal_and_discount) }}" class="travel_tour-LoopProduct-link">
											<span class="price"><del>
												<span class="travel_tour-Price-amount amount">&pound;{{$deal_and_discount->price}}</span></del>
												<ins><span class="travel_tour-Price-amount amount">&pound;{{ number_format($total, 2) }}</span></ins>
											</span>
												<span class="onsale">Offer!</span>
											@else
												<span class="price">
													<span class="travel_tour-Price-amount amount">&pound;{{ $deal_and_discount->price }}</span>
												</span>
											@endif
											@foreach($deal_and_discount->image as $images)
											@if ($loop->first)
												<img src="{{$images->file ? $images->file : 'http://www.hutterites.org/wp-content/uploads/2012/03/placeholder.jpg'}}" alt="{{$deal_and_discount->title}}" title="{{$deal_and_discount->title}}">
											@else
												@break
											@endif
											@endforeach
											</a>
										</div>
										<div class="wrapper_content">
											<div class="post_title"><h4>
												<a href="{{ action('ToursController@show', $deal_and_discount) }}" rel="bookmark">{{str_limit($deal_and_discount->title, 35)}}</a>
											</h4></div>
											@if($deal_and_discount->package)
												<span class="post_date">{{$deal_and_discount->package}}</span>
											@else
												<span class="post_date" style="visibility: hidden;"></span>
											@endif
											<p>{{str_limit($deal_and_discount->body, 90)}}</p>
										</div>
									</div>
									<div class="read_more">
										<div class="item_rating">
											<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
										</div>
										<a href="{{ action('ToursController@show', $deal_and_discount) }}" class="read_more_button">VIEW MORE
											<i class="fa fa-long-arrow-right"></i></a>
										<div class="clear"></div>
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div>
					@endif
				</div>
			</div>

@endsection	