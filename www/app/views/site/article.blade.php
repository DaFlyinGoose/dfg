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
		@include('includes.archives')
		  
    </div>
  </div>

@stop

@section('javascript')
	@parent
	<script src="/lib/vendor/rainbow/rainbow-custom.min.js"></script>
@stop
