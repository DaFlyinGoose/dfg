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
            width: 25%;
            float: left;
            display: inline-block;
            border: green solid 1px;
            margin: 0 10px 0 10px;
            height: 100%;
        }
        #cheatsheetContainer {
            width: 70%;
            float: left;
            display: inline-block;
            border: red solid 1px;
            margin: 0 10px 0 10px;
        }
    </style>    
@stop

@section('content')
<div class="container article wrapper">
    <div class="row wrapper__inner">
        <div class="large-12 columns">
            <section>
                <div id='menuContainer'>
                    1<br>
                    2<br>
                    3<br>
                    4<br>
                    5<br>
                </div>
                <div id='cheatsheetContainer'>
                    @foreach ($cheatsheets as $sheet)
                        <h1>{{ $sheet['name'] }}</h1>
                        <p>{{ $sheet['description'] }}</p>
                        <button>View Cheat Sheet...</button>
                        <hr width='85%'>
                    @endforeach
                </div>
            </section>
        </div>
    </div>
</div>
@stop