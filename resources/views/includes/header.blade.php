<header id="masthead" class="site-header sticky_header affix-top">
	<div class="navigation-menu">
			<div class="container">
				<div class="menu-mobile-effect navbar-toggle button-collapse" data-activates="mobile-demo">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</div>
				<div class="width-logo sm-logo">
					<a href="{{ route('home') }}" title="Travel" rel="home">
						<img src="{{config('app.url')}}images/logo.png" alt="Logo" width="474" height="130" class="logo_transparent_static">
						<img src="{{config('app.url')}}images/logo_sticky.png" alt="Sticky logo" width="474" height="130" class="logo_sticky">
					</a>
				</div>
				<nav class="width-navigation">
					<ul class="nav navbar-nav menu-main-menu side-nav" id="mobile-demo">
						<li {{{ (Request::is('/') ? 'class=current-menu-ancestor' : '') }}} ><a href="{{ route('home') }}">Home</a></li>
						<li {{{ (Request::is('holidays') ? 'class=current-menu-ancestor' : '') }}}><a href="{{ route('holidays') }}">Holidays</a></li>
						<!--{{Route::currentRouteName()}}{{Request::route()->getName()}}-->
						<li {{{ (Request::is('specialoffers') ? 'class=current-menu-ancestor' : '') }}}><a href="{{ route('specialoffers') }}">Special Offers</a></li>
						<!--<li {{{ (Request::is('tours') || Request::is('tour/*') ? 'class=current-menu-ancestor' : '') }}} ><a href="{{ route('tours') }}">Tours</a></li>-->
						<!--<li><a href="destinations.html">Cruises</a></li>-->
						<li {{{ (Request::is('citybreaks') ? 'class=current-menu-ancestor' : '') }}}><a href="{{ route('citybreaks') }}">City Breaks</a></li>
						<!--<li><a href="destinations.html">History & Culture</a></li>
						<li><a href="blog.html">Beaches & Sun</a></li>-->
						<li {{{ (Request::is('traveltips') ? 'class=current-menu-ancestor' : '') }}} ><a href="{{ route('traveltips') }}">Travel Trips</a></li>
						<li {{{ (Request::is('contact') ? 'class=current-menu-ancestor' : '') }}} ><a href="{{ route('contact') }}" >Contact Us</a></li>
					</ul>
				</nav>
			</div>
		</div>
</header>
