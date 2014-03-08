@extends('layouts.layout')

@section('stylesheets')
	@parent
	<link rel="stylesheet" href="/css/pages/article.css">
	<link href="/lib/vendor/rainbow/themes/github.css" rel="stylesheet" type="text/css">

@stop

@section('content')

  <div class="container article wrapper">
    <div class="row wrapper__inner">
      <div class="large-12 columns">
		  
		@include('includes.details')
		 <div id="disqus_thread"></div>
		 <script type="text/javascript">
        		/* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
       			var disqus_shortname = 'daflyingoose'; // required: replace example with your forum shortname

       			 /* * * DON'T EDIT BELOW THIS LINE * * */
        		(function() {
           			var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
           			dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
          			(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
       			 })();
 		 </script>
 		 <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
		 <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
		@include('includes.archives')
		  
    </div>
  </div>

@stop

@section('javascript')
	@parent
	<script src="/lib/vendor/rainbow/rainbow-custom.min.js"></script>
@stop
