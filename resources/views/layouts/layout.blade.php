@extends('layouts.master')

@section('meta')
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
@stop

@section('stylesheets')
	<link href='http://fonts.googleapis.com/css?family=Roboto|Roboto+Slab:400,700,300,100' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="/css/bundle.vendor.css">
	<link rel="stylesheet" href="/css/bundle.site.css">
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.min.css">
@stop

@section('body')
	<body>
		<div class="off-canvas-wrap">
			<div class="inner-wrap">

			<!-- MOBILE NAV -->
			<aside class="left-off-canvas-menu hide-for-medium-up">
				<ul class="off-canvas-list">
					<li><label class="first">Chris Goosey</label></li>
                    <li><a href="/cheatsheets">Cheat Sheets</a></li>
                    <li><a href="/blog">Blog</a></li>
					<li><a href="/#contact">Contact me</a></li>
				</ul>
			</aside>
			<!-- /MOBILE NAV -->

			<!-- MOBILE HEADER -->
			<nav class="tab-bar show-for-small ">
				<a class="left-off-canvas-toggle menu-icon ">
					<span>Chris&nbsp;Goosey</span>
				</a>
			</nav>
			<!-- /MOBILE HEADER -->

			<!-- TABLET UP HEADER -->
			<nav class="top-bar--goosey hide-for-small fixed">
				<div class="container">
					<div class="row">
						<div class="medium-6 large-6 columns">
							<h1><a href="/">Chris Goosey</a></h1>
						</div>
						<div class="medium-6 large-6 columns">
							<ul class="inline-list right">
                                {{--<li><a href="/cheatsheets">Cheat Sheets</a></li>--}}
								<li><a href="/blog">Blog</a></li>
								<li><a href="/#contact">Contact me</a></li>
							</ul>
						</div>
					</div>
				</div>
			</nav>
			<!-- /TABLET UP HEADER -->

			<!-- content -->
			@yield('content')
			<!-- /content -->

            <section class="social">
              <a href="http://stackoverflow.com/users/1651926/chris-goosey"><i class="fa fa-stack-overflow"></i></a>
              <a href="https://github.com/cgoosey1"><i class="fa fa-github"></i></a>
              <a href="http://uk.linkedin.com/pub/chris-goosey/4b/a98/4b9/"><i class="fa fa-linkedin-square"></i></a>
              <a href="https://twitter.com/DaFlyinGoose"><i class="fa fa-twitter-square"></i></a>
            </section>
			</div>
		</div>
		@section('javascript')
			<script src="/lib/jquery/dist/jquery.min.js"></script>
			<script src="/lib/foundation/js/foundation.js"></script>
			<!-- <script src="js/bundle.js"></script> -->
			<script>
				$(document).foundation();
			</script>
            <script>
              (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
              (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
              m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
              })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

              ga('create', 'UA-48816156-1', 'dfg.gd');
              ga('send', 'pageview');

            </script>
		@show
	</body>
@stop
