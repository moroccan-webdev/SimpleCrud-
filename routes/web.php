<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('client','ClientController');

Route::get('autocomplete',array('as'=>'autocomplete','uses'=>'AutoCompleteController@index'));
Route::get('searchajax',array('as'=>'searchajax','uses'=>'AutoCompleteController@autoComplete'));

Auth::routes();

Route::get('/home', 'HomeController@index');
// routes of mailing tutorial.
Route::get('/basicemail', 'MailController@basic_email');
Route::get('/htmlemail', 'MailController@html_email');
Route::get('/attachemail', 'MailController@attachment_email');

Route::get('my-test-mail','HomeController@myTestMail');

Route::get('contact', 'PagesController@getContact');
Route::post('contact', 'PagesController@postContact');

Route::get('google-line-chart', 'HomeController@googleLineChart');
