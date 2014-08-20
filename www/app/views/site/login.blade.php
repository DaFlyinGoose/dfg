@extends('layouts.layout')

@section('content')
	<div class="container wrapper">
		<div class="row wrapper__inner">
			{{ Form::open() }}
				{{ Form::label('email', 'E-Mail Address: ') }}
				{{ Form::text('email') }}
				<br>
				{{ Form::label('password', 'Password: ') }}
				{{ Form::password('password') }}
				<br>
				{{ Form::submit('Login') }}
			{{ Form::close() }}
		</div>
	</div>
@stop