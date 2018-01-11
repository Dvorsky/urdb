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

    $params = [
        'name' => 'World',
        'nesto' => 'asd',
    ];

    return view('welcome', $params);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('movie/add', 'MovieController@new_get')->name('get_new_movie');
Route::post('movie/add', 'MovieController@new_post')->name('post_new_movie');
