<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/diagrama',function ($data){
    return view('diagrama.index');
});

Route::resource('/firebase','firebase_controller');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/proyecto','proyecto_controller');
Route::get('/chat',function (){
    return view('chat.index');
});