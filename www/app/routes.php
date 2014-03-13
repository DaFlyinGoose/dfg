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
	return Response::view(
		'site.index',
		array(
			'posts' => Entities\Post::latest()->get()
		)
	);
});

Route::post('/', function() {
	$input = array_only(Input::all(), array('name', 'email', 'text'));
	$validator = Validator::make(
		$input,
		array('email' => 'required|email', 'text' => 'required')
	);
	
	if ($validator->fails())
	{
		return Redirect::to(URL::previous())->withErrors($validator);
	}
	else
	{
		Mail::queue('emails.contact', $input, function($message) {
			$message->to('chris@dfg.gd', 'Chris Goosey')
				->subject('DFG Contact Email');
		});
		
		return Redirect::to(URL::previous())->with('success', 'Message Sent!');
	}
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
