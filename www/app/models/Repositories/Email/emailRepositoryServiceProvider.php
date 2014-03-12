<?php namespace Repositories\Email;

use Entities\Email;
use Entities\EmailGroups;
use Repositories\Email\EmailRepository;
use Illuminate\Support\ServiceProvider;

class EmailRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('Repositories\Email\EmailInterface', function($app)
        {

             return new EmailRepository(new Email(), new EmailGroups());

        });
    }
}