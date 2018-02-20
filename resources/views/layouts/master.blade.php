<html>
    <head>
        <title>@yield('title', 'dfg - Chris Goosey')</title>
		
		@yield('head')
		
		@yield('meta')
		
		@yield('stylesheets')
    </head>
	@section('body')
    <body>
        @yield('content')
		
		@yield('javascript')
    </body>
	@show
</html>