<?php namespace Services\Email;

use Illuminate\Support\ServiceProvider;

/**
* Register our pokemon service with Laravel
*/
class EmailServiceServiceProvider extends ServiceProvider 
{
    /**
    * Registers the service in the IoC Container
    * 
    */
    public function register()
    {
        // Binds 'pokemonService' to the result of the closure
        $this->app->bind('emailService', function($app)
        {
            return new EmailService(
                // Inject in our class of pokemonInterface, this will be our repository
                $app->make('Repositories\Email\EmailInterface')
            );
        });
    }
}