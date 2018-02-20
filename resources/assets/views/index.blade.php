{% extends 'layout.blade.php' %}

{% block stylesheets %}
  <link rel="stylesheet" href="/css/pages/home.css">
{% endblock %}

{% block content %}

   <section class="hero">
      <div class="row">
        <h3>Recent posts</h3>
        <ul>
          <li><i class="fa fa-arrow-circle-o-right"></i> <a href="/article.html">Setting up a blogging application in Laravel</a> <span>(today)</span></li>
          <li><i class="fa fa-arrow-circle-o-right"></i> <a href="/article.html">Using Vagant to kickstart your Laravel app</a> <span>(one week ago)</span></li>
          <li><i class="fa fa-arrow-circle-o-right"></i> <a href="/article.html">How Laravel made me a better developer</a> <span>(one month ago)</span></li>
        </ul>
        <a class="next" href="#"><i class="fa fa-arrow-circle-down"></i></a>
      </div>
    </section>

    <section class="developer">
      <div class="row">
        <img src="/images/me.jpg" alt="Chris Goosey" class="radius">
        <h3>I'm a talented PHP developer</h3>
        <i class="fa fa-star"></i>
      </div>
    </section>

    <section class="work">
      <div class="row">
        <h3>Currently working with <a href="">jupix.com</a></h3>
        <i class="fa fa-users"></i>
      </div>
    </section>

    <section class="tech">
      <div class="row">
        <div class="large-12 columns">
          <h3>I have worked with many <span>languages</span></h3>
        </div>
      </div>
      <div class="row">
        <div class="large-12 columns">
          <span class="success label">PHP</span>
          <span class="success label">JavaScript</span>
          <span class="success label">CSS3</span>
          <span class="success label">HTML5</span>
          <span class="success label">NODEJS</span>
        </div>
      </div>
      <div class="row">
        <div class="large-12 columns">
          <h4>and <span>frameworks</span></h4>
        </div>
      </div>
      <div class="row">
        <div class="large-12 columns">
          <span class="label">Laravel</span>
          <span class="label">AngularJS</span>
          <span class="label">Symfony</span>
          <span class="label">Zend Framework</span>
        </div>
      </div>
      <i class="fa fa-check-square-o"></i>
    </section>

    <section class="contact" id="contact">
      <div class="container">
        <div class="row">
          <div class="large-6 columns">
            <h3>Get in touch</h3>
          </div>
        </div>
        <div class="row">
          <div class="large-6 columns">
            <form>
              <div class="row">
                <div class="large-12 columns">
                  <label>
                    <input type="text" placeholder="name" />
                  </label>
                </div>
              </div>
              <div class="row">
                <div class="large-12 columns">
                  <label>
                    <input type="text" placeholder="email" />
                  </label>
                </div>
              </div>
              <div class="row">
                <div class="large-12 columns">
                  <label>
                    <textarea rows="12x§  " placeholder="message"></textarea>
                  </label>
                </div>
              </div>
            </form>
            <a href="#" class="success button">Send</a>
          </div>
          <div class="large-6 columns">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent ut erat laoreet, posuere dolor vitae, dignissim tortor.</p>
            <p>Vestibulum congue urna nec accumsan porttitor. Phasellus et neque sit amet mi scelerisque semper.</p>
          </div>
        </div>
      </div>

    </section>

    <section class="social">

      <a href=""><i class="fa fa-stack-overflow"></i></a>
      <a href=""><i class="fa fa-github"></i></a>
      <a href=""><i class="fa fa-linkedin-square"></i></a>
      <a href=""><i class="fa fa-facebook-square"></i></a>

    </section>

{% endblock %}


