<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="keywords" content="" />
		<meta name="author" content="" />
		<meta name="robots" content="" />
		<meta name="description" content="" />
		<meta name="format-detection" content="telephone=no">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="xmlrpc.php">

		<title>{{ config('app.name', 'Laravel') }}</title>
		<!-- Styles -->
		<!--<link href="{{ asset('css/app.css') }}" rel="stylesheet">-->
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
		<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" type="text/css" media="all">
		<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" type="text/css" media="all">
		<link rel="stylesheet" href="{{ asset('css/flaticon.css') }}" type="text/css" media="all">
		<link rel="stylesheet" href="{{ asset('css/font-linearicons.css') }}" type="text/css" media="all">
		<link rel="stylesheet" href="{{ asset('style.css') }}" type="text/css" media="all">
		<link rel="stylesheet" href="{{ asset('css/travel-setting.css') }}" type="text/css" media="all">
		<link rel="icon" href="{{ config('app.url') }}images/favicon.png" type="image/x-icon" />
		<link rel="shortcut icon" type="image/x-icon" href="{{ config('app.url') }}images/favicon.png" />
		
		@yield('styles')
	</head>
	<!--@yield('content')-->
	<body class="{{{ (Request::is('tour/*') ? 'single-product travel_tour-page travel_tour' : 'transparent_home_page') }}}">
		<div class="wrapper-container">
			@include('includes.header')
			<div class="site wrapper-content">
				<div class="home-content" role="main">
					@yield('content')
					</div>
			</div>
			@include('includes.footer')
		</div>
		<script src="{{ asset('js/jquery.min.js') }}"></script>
		<script src="{{ asset('js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('js/vendors.js') }}"></script>
		<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
		<script src="{{ asset('js/jquery.mb-comingsoon.min.js') }}"></script>
		<script src="{{ asset('js/waypoints.min.js') }}"></script>
		<script src="{{ asset('js/jquery.counterup.min.js') }}"></script>
		<script src="{{ asset('js/theme.js') }}"></script>
		@yield('scripts')
	</body>
</html>
