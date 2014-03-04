<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	$posts = Fbf\LaravelBlog\Post::orderBy('id', 'DESC')
		->take('3')
		->get();
	return Response::view('site.index', array('posts' => $posts));
});

Route::get('/user/login', function() {
	if (Auth::check())
	{
		return Redirect::to('/admin');
	}
	
    return View::make('site.login');
});

Route::post('/user/login', function() {
   if (Auth::attempt(array('email' => Input::get('email'), 'password' => Input::get('password'))))
    {
        return Redirect::intended('/admin');
    }
    
    return 'could not login';
});

Route::post('/admin/order/save', array('before' => 'auth', function() {
    $groups = Input::get('order', array());
    
    foreach ($groups as $place => $group) 
    {
        $group = \Entities\Group::find($group);
        $group->order = ($place + 1);
        $group->save();
    }
    
    return 'success';
}));

Route::any('{all}', function($forward)
{
	$forwardService = new \Services\Forwards();
	$forward = $forwardService->findForward($forward);
	if ($forward) {
		$forwardService->logForward($forward);

		return Redirect::to($forward->url);
	}
	
	return Redirect::to('/');
})->where('all', '.*');
