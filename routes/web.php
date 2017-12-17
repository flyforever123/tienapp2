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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/jobs', 'JobController@index');
Route::get('/jobs/{job}', 'JobController@show')->name('jobs.show');

Route::get('/new_job', 'JobController@create');
Route::post('/new_job', 'JobController@store');
Route::post('jobs/{job}/new_bid', 'BidController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
