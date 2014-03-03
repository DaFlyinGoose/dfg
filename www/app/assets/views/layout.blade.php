<!DOCTYPE html>
<html class="{% block pageclass %}page-home{% endblock %}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>dfg - Chris Goosey</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link href='http://fonts.googleapis.com/css?family=Roboto|Roboto+Slab:400,700,300,100' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="/css/bundle.vendor.css">
  <link rel="stylesheet" href="/css/bundle.site.css">
  {% block stylesheets %}{% endblock %}
</head>
<body>
  <div class="off-canvas-wrap">
      <div class="inner-wrap">

        <!-- MOBILE NAV -->
        <aside class="left-off-canvas-menu">
          <ul class="off-canvas-list">
            <li><label class="first">Chris Goosey</label></li>
            <li><a href="/articles.html">Blog</a></li>
            <li><a href="/index.html#contact">Contact me</a></li>
          </ul>
        </aside>
        <!-- /MOBILE NAV -->

        <!-- MOBILE HEADER -->
        <nav class="tab-bar show-for-small ">
          <a class="left-off-canvas-toggle menu-icon ">
            <span>Chris&nbsp;Goosey</span>
          </a>
        </nav>
        <!-- /MOBILE HEADER -->

        <!-- TABLET UP HEADER -->
        <nav class="top-bar--goosey hide-for-small fixed">
          <div class="container">
            <div class="row">
              <div class="medium-6 large-6 columns">
                  <h1><a href="index.html">Chris Goosey</a></h1>
              </div>
              <div class="medium-6 large-6 columns">
                <ul class="inline-list right">
                  <li><a href="/articles.html">Blog</a></li>
                  <li><a href="/index.html#contact">Contact me</a></li>
                </ul>
              </div>
            </div>

          </div>
        </nav>
        <!-- /TABLET UP HEADER -->

        <!-- content -->
        {% block content %}{% endblock %}
        <!-- /content -->

    </div>
  </div>

  <script src="/lib/jquery/dist/jquery.min.js"></script>
  <script src="/lib/foundation/js/foundation.js"></script>
  <!-- <script src="js/bundle.js"></script> -->
  <script>
    $(document).foundation();
  </script>
  {% block javascripts %}{% endblock %}
</body>
</html>
