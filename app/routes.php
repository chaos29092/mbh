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
	return View::make('index');
});

Route::post('mailPost', function()
{
    $date = Input::all();

    Mail::send('emails.inquiry', array('subject'=>$date['subject'],'mes'=>$date['mes'],'email'=>$date['email']),function($message){
        $message->to(array('admin@hanvyzj.com','vp05@hanvyzj.com'), 'inquiry')->subject('网站询盘');
    });

    return Redirect::back()->with('message', 'Message Send Successfully! We will contact you as soon as possible.');
});
