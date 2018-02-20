<html>
<body>
{{ $newsletter->intro }}
<br><br>
@foreach ($articleForwards as $group => $articles)
    <h2>{{ $group }}</h2>
    @foreach ($articles as $article)
        <h4>{{ $article['article']->title }}</h4>
        {{ $article['article']->description }}
        <br><br>
        <a href="{{ config('app.url') }}/{{ $article['forward'] }}">{{ $article['article']->url }}</a>
        <br><br>
    @endforeach
@endforeach
{{ $newsletter->conclusion }}
<p>To unsubscribe from these emails please <a href="{{ config('app.url') }}/unsubscribe/{{ $email }}">click here</a>.</p>
</body>
</html>