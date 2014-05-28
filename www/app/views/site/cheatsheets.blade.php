@extends('layouts.layout')

@section('stylesheets')
	@parent
	<link rel="stylesheet" href="/css/pages/article.css">
	<link href="/lib/vendor/rainbow/themes/github.css" rel="stylesheet" type="text/css">
    <!-- Begin MailChimp Signup Form -->
    <link href="//cdn-images.mailchimp.com/embedcode/classic-081711.css" rel="stylesheet" type="text/css">
    <style type="text/css">
        #mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; }
        /* Add your own MailChimp form style overrides in your site stylesheet or in this style block.
           We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
    </style>
    <style>
        #menuContainer {
            position: fixed;
            width: 200px;
            float: left;
            margin: 0 10px 0 10px;
        }
        #menuContainer div {
            font-weight: 400;
            font-family: Roboto Slab,Helvetica,Arial,Sans-serif;
            font-size: 14px;
            line-height: 14px;
            white-space: nowrap;
            display: inline-block;
            position: relative;
            border-bottom: 1px solid #fff;
            padding: .7rem 1rem;
            background-color: #008CBA;
            color: #fff;
            width: 93%;
            -webkit-transition: background-color 300ms ease-out;
            transition: background-color 300ms ease-out;
            -webkit-transition: width 300ms ease-out;
            transition: width 300ms ease-out;
        }
        #menuContainer div:hover {
            background-color: #007295;
            cursor:pointer;
        }
        #menuContainer .active {
            width: 100%;
        }
        #cheatsheetContainer {
            width: 70%;
            float: left;
            display: inline-block;
            margin: 0 10px 0 240px;
        }
        button {
            padding: .5rem 1.25rem;
        }
    </style>    
@stop

@section('content')
<div class="container article wrapper">
    <div class="row wrapper__inner">
        <div class="large-12 columns">
            <section>
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
                        <a href="http://twitter.com/share" class="twitter-share-button" data-count="horizontal" data-text="{{ $sheet['name'] }}" data-url="{{ $sheet['url'] }}" data-via="" data-size="large">Tweet</a>
                        <hr>
                    @endforeach
                </div>
            </section>
        </div>
    </div>
</div>
@stop

@section('javascript')
	@parent
    <script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
    <script type="text/javascript" src="/js/waypoints.min.js"></script>
    <script>
        $('html, body').animate({ scrollTop: 0 }, 0);
        var scroll = true;
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
    </script>
    
@stop