<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('includes.details', function($view)
        {
            $article = Models\Post::where('slug', Request::segment(2))
                ->first();

            $article->hits = $article->hits + 1;
            $article->save();
        });
        view()->composer(array('administrator::layouts.default'), function($view)
        {
            if ($view->page === 'site.admin.order')
            {
                //add page-specific assets
                $view->js['jquery'] = '/js/jquery-1.9.1.min.js';
                $view->js += [
                    'admin' => '/js/admin.js',
                ];
                $view->css += [
                    'jquery-ui' => '/css/jquery-ui.css',
                    'admin' => '/css/admin.css',
                ];
            }
        });

        view()->composer(array('site.admin.order'), function($view) {
            $view->with('groups', \Models\Group::orderBy('order')->get());
        });

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
}
