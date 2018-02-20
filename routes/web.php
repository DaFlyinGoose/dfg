<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/cheatsheets', function() {
    $data = array('cheatsheets' => Models\CheatSheets::all());

    return View::make('site.cheatsheets', $data);
});
Route::post('/cheatsheets', function() {
    if (!Request::has('url'))
    {
        $input = Request::all();
        $validator = Validator::make(
            $input,
            array(
                'email' => 'required|email',
                'text' => 'required',
                'my_name'   => 'honeypot',
                'my_time'   => 'required|honeytime:5'
            )
        );

        if ($validator->fails())
        {
            return Redirect::to('/cheatsheets#contact')->withErrors($validator);
        }
        else
        {
            Mail::queue('emails.contact', $input, function($message) {
                $message->to('chris@dfg.gd', 'Chris Goosey')
                    ->subject('DFG Contact Email');
            });

            return Redirect::to('/cheatsheets#contact')->with('success', 'Message Sent!');
        }
    }
    else
    {
        $input = Request::all();
        $validator = Validator::make(
            $input,
            array(
                'url' => 'required',
                'my_name'   => 'honeypot',
                'my_time'   => 'required|honeytime:5'
            )
        );

        if ($validator->fails())
        {
            return Redirect::to('/cheatsheets#contact')->withErrors($validator);
        }
        else
        {
            Mail::queue('emails.cheatsheet', $input, function($message) {
                $message->to('chris@dfg.gd', 'Chris Goosey')
                    ->subject('DFG Cheat Sheet Suggestion');
            });

            return Redirect::to('/cheatsheets#contact')->with('success', 'Cheat Sheet Submitted!');
        }
    }
});

Route::get('/', function()
{
    return Response::view(
        'site.index',
        array(
            'posts' => Models\Post::latest()->get()
        )
    );
});

Route::get('/blog_articles/laravel-artisan-cheatsheet', function() {
    return View::make('site.blog.artisan-cheatsheet');
});

Route::post('/', function() {
    $input = Request::all();
    $validator = Validator::make(
        $input,
        array(
            'email' => 'required|email',
            'text' => 'required',
            'my_name'   => 'honeypot',
            'my_time'   => 'required|honeytime:5'
        )
    );

    if ($validator->fails())
    {
        return Redirect::to('/#contact')->withErrors($validator);
    }
    else
    {
        Mail::to('chris@dfg.gd', 'Chris Goosey')->send(new \App\Mail\Contact($input));

        return Redirect::to('/#contact')->with('success', 'Message Sent!');
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
    if (Auth::attempt(array('email' => Request::get('email'), 'password' => Request::get('password'))))
    {
        return Redirect::intended('/admin');
    }

    return 'could not login';
});

Route::post('/admin/order/save', array('before' => 'auth', function() {
    $groups = Request::get('order', array());

    foreach ($groups as $place => $group)
    {
        $group = \Models\Group::find($group);
        $group->order = ($place + 1);
        print_r($group->save() . ' ');
    }

    return 'success';
}));

Route::get('/unsubscribe/{email}', function ($email) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $success = 'invalid';
    }
    else {
        $success = \Models\Email::where('email', $email)->update(['group_id' => \Models\EmailGroups::UNSUBSCRIBE_GROUP]);
        request()->session()->flash('email', $email);
    }

    return view('site.unsubscribe', ['success' => $success]);
});

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