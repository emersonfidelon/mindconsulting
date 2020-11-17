<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::namespace('Api')->group(function(){

    Route::post('auth/login', 'Auth\\AuthController@login');
    Route::post('auth/register', 'Auth\\AuthController@register');
    Route::post('auth/logout', 'Auth\\AuthController@logout');
    
    Route::group(['middleware' => ['jwt.auth']], function() {
        Route::post('auth/refresh', 'Auth\\AuthController@refresh');
        Route::get('auth/user-profile', 'Auth\\AuthController@userProfile');

        Route::resource('users', 'UserController');
    });
});
