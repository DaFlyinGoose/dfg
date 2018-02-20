@extends('layouts.layout')

@section('content')
	<div class="container wrapper">
		<div class="row wrapper__inner">
			<h4>Sorry to see you go</h4>
			<p>I hope I haven't annoyed you with too many emails, I also welcome all feedback, so if you think there is something I can do better, please let me know.</p>
			@if ($success === 'invalid')
				<p>It seems the email address received was not valid, if your having issues you can use the form below to contact me.</p>
			@elseif (!$success)
				<p>Annoyingly it seems there was an error unsubscribing that email address, might be best to contact me using the form below to sort this out.</p>
			@else
				<p>Your email address was unsubscribed, I hope you have a pleasant day :).</p>
			@endif

			{{ Form::open(['url' => '/']) }}
			@include('includes.contact')
		</div>
	</div>
@stop