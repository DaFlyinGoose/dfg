{% extends 'layout.blade.php' %}

{% block stylesheets %}
  <link rel="stylesheet" href="/css/pages/article.css">
  <link href="/lib/vendor/rainbow/themes/github.css" rel="stylesheet" type="text/css">

{% endblock %}

{% block content %}

  <div class="container article wrapper">
    <div class="row wrapper__inner">
      <div class="large-12 columns">
        <h1 class="article__header">Vero excepturi sint voluptas recusandae et.</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc pulvinar nisl sit amet mollis ultricies. Nulla egestas purus in elit auctor, quis imperdiet massa rutrum. Aenean feugiat ipsum non cursus porta. Sed varius magna at semper ultrices.</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc pulvinar nisl sit amet mollis ultricies. Nulla egestas purus in elit auctor, quis imperdiet massa rutrum. Aenean feugiat ipsum non cursus porta. Sed varius magna at semper ultrices.</p>
        <h2>Libero molestiae.</h2>
        <pre><code data-language="javascript">var div = document.createElement('div');
div.innerHTML = '<p>code:</p><pre><code data-language="javascript">var foo = true;</code></pre>';
Rainbow.color(div, function() {
    document.getElementById('other_div').appendChild(div);
});</code></pre>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc pulvinar nisl sit amet mollis ultricies. Nulla egestas purus in elit auctor, quis imperdiet massa rutrum. Aenean feugiat ipsum non cursus porta. Sed varius magna at semper ultrices.</p>
        <pre><code data-language="javascript">Rainbow.extend([
    {
        'matches': [
            {
                'name': 'constant.boolean.true',
                'pattern': /true/
            },
            {
                'name': 'constant.boolean.false',
                'pattern': /false/
            }
        ],
        'pattern': /true|false/g
    }
]);</code></pre>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc pulvinar nisl sit amet mollis ultricies. Nulla egestas purus in elit auctor, quis imperdiet massa rutrum. Aenean feugiat ipsum non cursus porta. Sed varius magna at semper ultrices.</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc pulvinar nisl sit amet mollis ultricies. Nulla egestas purus in elit auctor, quis imperdiet massa rutrum. Aenean feugiat ipsum non cursus porta. Sed varius magna at semper ultrices.</p>
      </div>
    </div>
  </div>

{% endblock %}

{% block javascripts %}
  <script src="/lib/vendor/rainbow/rainbow-custom.min.js"></script>
{% endblock %}
