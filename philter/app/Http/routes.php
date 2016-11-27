<?php

/****************************************
 * Defaults
 ****************************************/

Route::get('/', function () {
    return view('auth.login');
});

/****************************************
 * User Authentication Routes
 ****************************************/

// User Authentication
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// User Registration
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// Post Authentication
Route::get('home', function () {
    $user     = Auth::user();
    $projects = Auth::user()->projects;

    return view('dashboard', ['projects' => $projects, 'user' => $user]);
});

/****************************************
 * Philter Routes
 ****************************************/

// User Routing
Route::resource('users', 'UserController', ['except' => ['update']]);
Route::post('users/{id}/edit', 'UserController@update');

// Project Routing
Route::resource('projects', 'ProjectController', ['except' => ['store', 'update']]);
Route::post('projects/create', 'ProjectController@store');
Route::post('projects/{id}/edit', 'ProjectController@update');

// Lead Routing
Route::resource('leads', 'LeadController', ['except' => ['store', 'update']]);
Route::post('leads/create', 'LeadController@store');
Route::post('leads/{id}/edit', 'LeadController@update');
