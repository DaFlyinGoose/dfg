<div class="item-list">

	@if (!empty($posts))

		@foreach ($posts as $post)
		<div class="large-12 columns">
			<h3>{{ $post->title }}</h3>
			{{ $post->summary }}
			<a href="{{ $post->getUrl() }}" class="button success right" title="{{ $post->title }}">Read more</a>
			<hr>
		</div>
		@endforeach

		{{ $posts->links() }}

		@else

			<p class="item-list--empty">
				{{ trans('laravel-blog::messages.list.no_items') }}
			</p>

	@endif
</div>