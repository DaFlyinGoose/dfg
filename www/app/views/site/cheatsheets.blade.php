@extends('layouts.layout')

@section('stylesheets')
	@parent
	<link rel="stylesheet" href="/css/pages/article.css">
	<link rel="stylesheet" href="/css/pages/home.css">
	<link rel="stylesheet" href="/css/pages/cheatsheet.css">
	<link href="/lib/vendor/rainbow/themes/github.css" rel="stylesheet" type="text/css">
@stop

@section('content')
<div class="container article wrapper">
    <div class="row wrapper__inner">
        <div class="large-12 columns">
            <section class='cheatsheetContainer'>
                <div id='menuContainer'>
                    @foreach ($cheatsheets as $sheet)
                        <div 
                            @if ($cheatsheets[0]['id'] == $sheet['id'])
                                class='cheatsheetLink active' 
                            @else
                                class='cheatsheetLink' 
                            @endif
                        id='{{ camel_case($sheet['name']) }}'>{{ $sheet['name'] }}</div>
                    @endforeach
                </div>
                <div id='cheatsheetContainer'>
                    @foreach ($cheatsheets as $sheet)
                        <h1 id='{{ camel_case($sheet['name']) }}Desc'>{{ $sheet['name'] }}</h1>
                        <p>{{ $sheet['description'] }}</p>
                        <a href='{{ $sheet['url'] }}' target='_blank'><button>View Cheat Sheet...</button></a>
                        <div class='sharingButtons'>
                            <a href="http://twitter.com/share" class="twitter-share-button" data-count="horizontal" data-text="{{ $sheet['name'] }}" data-url="{{ $sheet['url'] }}" data-via="">Tweet</a>
                            <div class="fb-share-button" data-href="{{ $sheet['name'] }}" data-type="button_count"></div>
                        </div>
                        <hr>
                    @endforeach
                </div>
            </section>
            <br style='clear:both;'/>
            <section class="contact" id="contact">
                <div class="row">
                    <div class="large-6 columns">
                      <h3>Suggest a Cheat Sheet</h3>
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
                            {{ Form::text('name', Session::get('name', ''), array('placeholder' => 'Name')) }}
                          </label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="large-12 columns">
                          <label>
                            {{ Form::text('email', Session::get('email', ''), array('placeholder' => 'Email')) }}
                          </label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="large-12 columns">
                          <label>
                            {{ Form::text('url', Session::get('url', ''), array('placeholder' => 'Cheat Sheet URL')) }}
                          </label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="large-12 columns">
                          <label>
                            {{ Form::textarea('text', Session::get('text', ''), array('placeholder' => 'Message?', 'rows' => '12x§')) }}
                          </label>
                        </div>
                      </div>
                    {{ Form::honeypot('my_name', 'my_time') }}
                    {{ Form::submit('Send', array('class' => 'success button')) }}
                    {{ Form::close() }}
                  </div>
                  <div class="large-6 columns">
                      <p></p>
                  </div>
                </div>
            </section>
        </div>
    </div>
</div>
@stop

@section('javascript')
	@parent
    <script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
    <script type="text/javascript" src="/lib/jquery-waypoints/waypoints.min.js"></script>
    <script type="text/javascript" src="/js/jquery-scrolltofixed-min.js"></script>
    <script>
        $(document).ready(function() {
            $('html, body').animate({ scrollTop: 0 }, 0);
            var scroll = true;

            $('#menuContainer').scrollToFixed({
                marginTop: 0,
                offsetLeft: 20,
                limit: function() {
                    return $("#cheatsheetContainer h1").last().offset().top;
                },
                zIndex: 999,
            });

            $('.cheatsheetLink').click(function() {
                scroll = false;
                var element = $(this).attr('id');
                removeActiveTab();
                $(this).addClass('active');
                $('html, body').animate({
                    scrollTop: ($("#" + element + "Desc").offset().top - 100)
                }, 500, 'swing', function () { scroll = true;});
            });

            @foreach ($cheatsheets as $sheet)
                $('#{{ camel_case($sheet['name']) }}Desc').waypoint(function(direction) {
                    if (scroll == true)
                    {
                        removeActiveTab();
                        var id = $(this).attr('id').slice(0, -4);
                        $('#' + id).addClass('active');
                    }
                });
            @endforeach

            function removeActiveTab()
            {
                $('#menuContainer').children().each(function() {
                    $(this).removeClass('active');
                });
            }
        });
    </script>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&appId=237805086347587&version=v2.0";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
@stop