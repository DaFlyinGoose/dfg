@extends('layouts.layout')

@section('stylesheets')
	@parent
	<link rel="stylesheet" href="/css/pages/home.css">
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.min.css">
@stop

@section('content')

   <section class="hero">
      <div class="row">
        <h3>Recent posts</h3>
        <ul>
			@foreach ($posts as $post)
				<li><i class="fa fa-arrow-circle-o-right"></i> <a href="{{ $post->getUrl() }}">{{ $post->title }}</a> <span>({{ $post->human_date }})</span></li>
			@endforeach
        </ul>
        <a class="next" href="#"><i class="fa fa-arrow-circle-down"></i></a>
      </div>
    </section>

    <section class="developer">
      <div class="row">
        <img src="/images/me.jpg" alt="Chris Goosey" class="radius">
        <h3>I'm a talented PHP developer</h3>
        <i class="fa fa-star"></i>
      </div>
    </section>

    <section class="work">
      <div class="row">
        <h3>Currently working with <a href="">jupix.com</a></h3>
        <i class="fa fa-users"></i>
      </div>
    </section>

    <section class="tech">
      <div class="row">
        <div class="large-12 columns">
          <h3>I have worked with many <span>languages</span></h3>
        </div>
      </div>
      <div class="row">
        <div class="large-12 columns">
          <span class="success label">PHP</span>
          <span class="success label">JavaScript</span>
          <span class="success label">CSS3</span>
          <span class="success label">HTML5</span>
        </div>
      </div>
      <div class="row">
        <div class="large-12 columns">
          <h4>and <span>frameworks</span></h4>
        </div>
      </div>
      <div class="row">
        <div class="large-12 columns">
          <span class="label">Laravel</span>
          <span class="label">AngularJS</span>
          <span class="label">Symfony</span>
        </div>
      </div>
      <i class="fa fa-check-square-o"></i>
    </section>

    <section class="contact" id="contact">
      <div class="container">
        <div class="row">
          <div class="large-6 columns">
            <h3>Get in touch</h3>
			@if (count($errors->getMessages()) > 0)
				@foreach ($errors->getMessages() as $errorArr)
					@foreach ($errorArr as $error)	
						<p>{{ $error }}</p>
					@endforeach
				@endforeach
			@endif
			@if (Session::has('success'))
				<p>{{ Session::get('success') }}</p>
			@endif
          </div>
        </div>
        <div class="row">
          <div class="large-6 columns">
            {{ Form::open() }}
              <div class="row">
                <div class="large-12 columns">
                  <label>
					{{ Form::text('name', Session::get('name', ''), array('placeholder' => 'name')) }}
                  </label>
                </div>
              </div>
              <div class="row">
                <div class="large-12 columns">
                  <label>
					{{ Form::text('email', Session::get('email', ''), array('placeholder' => 'email')) }}
                  </label>
                </div>
              </div>
              <div class="row">
                <div class="large-12 columns">
                  <label>
					{{ Form::textarea('text', Session::get('text', ''), array('placeholder' => 'message', 'rows' => '12x§')) }}
                  </label>
                </div>
              </div>
              <div class="row">
                <div class="large-12 columns">
                  <label>
					{{ HTML::image(Captcha::img(), 'Captcha image') }}<br>
					{{ Form::text('captcha', '', array('placeholder' => 'Enter text from above'))) }}
                  </label>
                </div>
              </div>
			{{ Form::submit('Send', array('class' => 'success button')) }}
            {{ Form::close() }}
          </div>
          <div class="large-6 columns">
			  <p>I built this blog to reach out to the community, I'm always happy to hear from other developers.</p> 
			  <p>Whether you have comments about a post or have a good suggestion for another, feel free to get in touch!</p>
            <p>Also happy to receive funny memes...</p>
          </div>
        </div>
      </div>

    </section>

    <section class="social">

      <a href="http://stackoverflow.com/users/1651926/chris-goosey"><i class="fa fa-stack-overflow"></i></a>
      <a href="https://github.com/cgoosey1"><i class="fa fa-github"></i></a>
      <a href="http://uk.linkedin.com/pub/chris-goosey/4b/a98/4b9/"><i class="fa fa-linkedin-square"></i></a>
      <a href="https://twitter.com/DaFlyinGoose"><i class="fa fa-twitter-square"></i></a>

    </section>

@stop


