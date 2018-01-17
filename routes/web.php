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


Route::get('{user_id}/lists/', 'UserListsController@get')->name('lists');
Route::get('{user_id}/lists/new', 'UserListsController@create')->name('lists.create');
Route::post('{user_id}/lists/new', 'UserListsController@store')->name('lists.store');

Route::get('{user_id}/lists/{list_id}/movie/add', 'MovieController@create')->name('movie.create');
Route::post('{user_id}/lists/{list_id}/movie/add', 'MovieController@store')->name('movie.store');
