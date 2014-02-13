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
	return View::make('hello');
});

Route::get('test', function() {
    with(new \Services\Newsletter)->sendNewsletter(Newsletter::find(1));
    return 'test';
});

Route::get('/user/login', function() {
    return "<form method=POST>email: <input type='text' name='email'><br>Password: <input type='password' name='password'><br><input type='submit'>";
});

Route::post('/user/login', function() {
   if (Auth::attempt(array('email' => Input::get('email'), 'password' => Input::get('password'))))
    {
        return Redirect::intended('admin');
    }
    
    return 'could not login';
});