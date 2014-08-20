@extends('layouts.layout')

@section('stylesheets')
	@parent
	<link rel="stylesheet" href="/css/pages/article.css">
    <link rel="stylesheet" href="/css/pages/home.css">
    <link rel="stylesheet" href="/css/pages/cheatsheet.css">
    <link rel="stylesheet" href="/lib/custombox/src/jquery.custombox.css">
	<link href="/lib/vendor/rainbow/themes/github.css" rel="stylesheet" type="text/css">
@stop

@section('content')
<div class="container article wrapper">
    <div class="row wrapper__inner">
        <div class="large-12 columns cheatsheetContainer">
            <div class='row'>
                <div class="hide-for-medium-up off-canvas-wrap" id='hiddenMenuContainer' data-offcanvas>
                    <div class="inner-wrap">
                        <img class="left-off-canvas-toggle" src="/images/menu.png">
                        <!-- Off Canvas Menu -->
                        <aside class="left-off-canvas-menu">
                            <!-- whatever you want goes here -->
                            <ul>
                                @foreach ($cheatsheets as $sheet)
                                    <li class="exit-off-canvas {{ ($cheatsheets[0]['id'] == $sheet['id'])? 'cheatsheetLink active': 'cheatsheetLink' }}" id='sm{{ camel_case($sheet['name']) }}'>
                                        {{ $sheet['name'] }}
                                    </li>
                                @endforeach
                                <li class="exit-off-canvas" id="exitHiddenMenu">Back To Cheat Sheets</li>
                            </ul>
                            <br style="clear:both;">
                            <!-- close the off-canvas menu -->
                        </aside>

                    </div>
                </div>
                <div class='show-for-medium-up medium-4 large-3 column' id='menuContainer'>
                    @foreach ($cheatsheets as $sheet)
                    <div class="fullTitle {{ ($cheatsheets[0]['id'] == $sheet['id'])? 'cheatsheetLink active': 'cheatsheetLink' }}" id='lg{{ camel_case($sheet['name']) }}'>
                        {{ $sheet['name'] }}
                    </div>
                    @endforeach
                </div>
                <div class='small-11 medium-8 large-9 column' id='cheatsheetContainer'>
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
            </div>
            <br style='clear:both;'/>
            <section class="contact" id="contact">
                <div class="row">
                    <div class="small-12 large-6 columns push-6" id="contact">
                        <h2>Enjoyed this page?</h2>
                        <p>If you want more content like these links why don't you <a class="subscribe">subscribe</a> to my newsletter?</p>
                        <p>I also have a pretty cool twitter, if your looking for someone to <a href="https://twitter.com/DaFlyinGoose" class="twitter-follow-button" data-show-count="false" data-size="large" data-show-screen-name="false" data-dnt="true">Follow @DaFlyinGoose</a>
                            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script></p>
                        <p>I also love to hear from my readers, feel free to drop me an <a id="contactForm">email</a> and discuss developer shiz.</p>
                    </div>
                  <div class="small-12 large-6 columns pull-6">
                      <h2>Suggest a Cheat Sheet</h2>
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
                </div>
            </section>
        </div>
    </div>
</div>
<div id="subscribeLightbox" class="lightbox">
    @include('includes.subscribe')
</div>
<div id="contactLightbox" class="lightbox">
    <h3>Get In Touch</h3>
    <p>If you want to discuss any of the technologies mentioned here, or any cool projects you are working on, please drop me a line!</p>
    {{ Form::open(array('url' => '/cheatsheets')) }}
    @include('includes.contact')
</div>
@stop

@section('javascript')
	@parent
    <script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
    <script type="text/javascript" src="/lib/jquery-waypoints/waypoints.min.js"></script>
    <script type="text/javascript" src="/js/jquery-scrolltofixed-min.js"></script>
    <script type="text/javascript" src="/lib/custombox/src/jquery.custombox.js"></script>
    <script>
        $(document).ready(function() {
            $('#subscribeLightbox').hide();
            $('.subscribe').click(function() {
                $.fn.custombox(this, {url: '#subscribeLightbox',
                    complete: function() {
                        $('#mc-embedded-subscribe').click(function() {
                            $.fn.custombox('close');
                        });
                    }
                });
            });
            $('#contactLightbox').hide();
            $('#contactForm').click(function() {
                $.fn.custombox(this, {url: '#contactLightbox',
                    complete: function() {
                        $('#mc-embedded-subscribe').click(function() {
                            $.fn.custombox('close');
                        });
                    }
                });
            });
            $(document).on('touchmove', function(e) {
                if ($('#cheatsheetContainer').css('visibility') == 'hidden')
                {
                    e.preventDefault();
                }
            });
            $(document).on('open.fndtn.offcanvas', '[data-offcanvas]', function () {
                $('#cheatsheetContainer').css('visibility', 'hidden');
            })
            .on('close.fndtn.offcanvas', '[data-offcanvas]', function () {
                $('#cheatsheetContainer').css('visibility', 'visible');
            });
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
                var element = $(this).attr('id').substr(2);
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
                        $('#sm' + id).addClass('active');
                        $('#lg' + id).addClass('active');
                    }
                },{offset:90});
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