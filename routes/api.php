<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::namespace('Api')->group(function(){

    Route::post('login', 'Auth\\AuthController@login');
    Route::post('register', 'Auth\\AuthController@register');
    Route::post('logout', 'Auth\\AuthController@logout');
    
    Route::group(['middleware' => ['jwt.auth']], function() {
        Route::post('refresh', 'Auth\\AuthController@refresh');
        Route::get('user-profile', 'Auth\\AuthController@userProfile');

        Route::resource('users', 'UserController');
    });
});
