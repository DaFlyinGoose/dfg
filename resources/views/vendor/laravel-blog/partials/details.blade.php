<h1 class="article__header">{{ $post->title }}</h1>

	<p class="item--date">
		{!! $post->getDate() !!}
	</p>
	
	{!! $post->content !!}
	

@if (Config::get('laravel-blog::views.view_page.show_adjacent_items') && ($newer || $older))
	@include('includes.adjacent')
@endif