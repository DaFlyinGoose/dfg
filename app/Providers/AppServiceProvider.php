<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Models\Post;
use Services\Email\EmailService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('EmailService', function($app)
        {
            return new EmailService(app('Mailchimp'));
        });

        $this->app->bind('Fbf\LaravelBlog\Post', function($app)
        {
            return new Post();
        });
    }
}
