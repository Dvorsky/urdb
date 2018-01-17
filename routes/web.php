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


Route::get('{user_id}/lists/', 'UserListsController@get')->name('get_lists');
Route::get('{user_id}/lists/new', 'UserListsController@new_get')->name('get_new_list');
Route::post('{user_id}/lists/new', 'UserListsController@new_post')->name('post_new_list');

Route::get('{user_id}/lists/{list_id}/movie/add', 'MovieController@new_get')->name('get_new_movie');
Route::post('{user_id}/lists/{list_id}/movie/add', 'MovieController@new_post')->name('post_new_movie');
