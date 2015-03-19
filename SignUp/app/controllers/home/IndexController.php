<?php

namespace App\Controllers\Home;

use SignLecture;

use Input, Notification, Redirect, Sentry, Str, DB;

use Auth, BaseController, Form, View;

class IndexController extends BaseController {

    /*
    |--------------------------------------------------------------------------
    | Default Home Controller
    |--------------------------------------------------------------------------
    |
    | You may wish to use controllers instead of, or in addition to, Closure
    | based routes. That's great! Here is an example controller method to
    | get you started. To route to this controller, just add the route:
    |
    |	Route::get('/', 'HomeController@showWelcome');
    |
    */

    public function index()
    {
        $lastOne = DB::table('sign_lectures')
                            ->orderBy('lec_id', 'desc')
                            ->limit(1)
                            ->get();

        return View::make('home.index.index')->with('lastOne', $lastOne[0]);
    }

    public function signUp()
    {
        dd(Input::all());
        return View::make('home.index.signUp');
    }
}