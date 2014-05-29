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
        .codeHolder {
            background: #f8f8f8;
            -moz-border-radius: 3px;
            -webkit-border-radius: 3px;
            border-radius: 3px;
            border: 1px solid #ccc;
            word-wrap: break-word;
            padding: 6px 10px;
            line-height: 19px;
            margin-bottom: 20px;
        }
        .codeHolder pre {
            width: 30%;
            margin-bottom: 5px;
            float:left;
            background: #fff;
            margin-right: 10px;
            overflow: auto;
        }
        .codeHolder code {
            background-color: #fff;
        }
        .codeHolder section {
            float:left;
            -moz-border-radius: 3px;
            -webkit-border-radius: 3px;
            border-radius: 3px;
            border: 1px solid #ccc;
            background: #ffffff;
        }
    </style>
@stop

@section('javascript')
	@parent
    <script>
        $(document).ready(function() {
            var width = $('.codeHolder').width();
            var codeWidth = $('.codeHolder pre').width();
            var height = $(window).height() - 200;
            $('.codeHolder section').width(width - codeWidth - 37);
            $('.codeHolder section').height(height + 12);
            $('.codeHolder pre').height(height);
            
            $('.codeHolder pre span').mouseover(function() {
                $('.codeHolder section').html($(this).text());
            });
        });
    </script>
@stop

@section('content')

  <div class="container article wrapper">
    <div class="row wrapper__inner">
      <div class="large-12 columns">

		
          <main class='codeHolder'>
            <pre><code data-language="php">
  Laravel Framework version 4.1

  Usage:
  [options] command [argument

  Options:
  --help
  --quiet
  --verbose
  --version     
  --ansi     
  --no-ansi   
  --no-interaction
  --env

  Available commands:
  changes
  clear-compiled
  down
  dump-autoload
  env
  help
  list
  migrate
  optimize
  routes
  serve
  tail
  tinker
  up
  workbench
  asset
  asset:publish

  auth
  auth:clear-reminders
  auth:reminders-controller
  auth:reminders-table

  cache
  cache:clear
  command
  command:make
  config
  config:publish

  controller
  controller:make
  cron
  cron:subscribed
  db
  db:seed
  key
  key:generate
  migrate
  migrate:install
  migrate:make
  migrate:publish
  migrate:refresh
  migrate:reset
  migrate:rollback
  queue
  queue:failed
  queue:failed-table
  queue:flush
  queue:forget
  queue:listen
             </code></pre>
            <section>test</section>
            <br style='clear:both;'>
          </main>
        
          

          
          
          
          
        <div id="mc_embed_signup">
        <form action="http://dfg.us3.list-manage1.com/subscribe/post?u=4a528a507f9b478b5867f1a38&amp;id=f960c71c6b" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
            <h2>Sign Up For My Newsletter</h2>
            <p>Every week I put together an article digest of web related articles I found interesting and wanted to share, if you would like to receive this email please subscribe below!</p>
        <div class="indicates-required"><span class="asterisk">*</span> indicates required</div>
        <div class="mc-field-group">
            <label for="mce-NAME">Your Name </label>
            <input type="text" value="" name="NAME" class="" id="mce-NAME">
        </div>
        <div class="mc-field-group">
            <label for="mce-EMAIL">Your Email Address  <span class="asterisk">*</span>
        </label>
            <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
        </div>
            <div id="mce-responses" class="clear">
                <div class="response" id="mce-error-response" style="display:none"></div>
                <div class="response" id="mce-success-response" style="display:none"></div>
            </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
            <div style="position: absolute; left: -5000px;"><input type="text" name="b_4a528a507f9b478b5867f1a38_f960c71c6b" value=""></div>
            <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
        </form>
        </div>
		 <div id="disqus_thread"></div>
 		 <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
		 <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
		<!-- @include('includes.archives') -->

    </div>
  </div>

@stop