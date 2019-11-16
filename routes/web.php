<?php


Route::get('/', function () {
    return view('welcome');
});


Route::get('ajax','mainController@index');//For country and state
Route::get('/getStates/{id}','mainController@getStates');//For country and state



Route::resource('contact','contactFormController');//for dynamically getting data and store
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
