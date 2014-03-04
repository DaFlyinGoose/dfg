@extends('layouts.layout')

@section('stylesheets')
	@parent
	<link rel="stylesheet" href="/css/pages/articles.css">
@stop

@section('content')

		<div class="container wrapper">
			<div class="row wrapper__inner">
				@include('includes.list')
				@include('includes.archives')
			</div>
		</div>

@stop
