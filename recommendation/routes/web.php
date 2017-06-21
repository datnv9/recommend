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

Route::post('/rate', [
    'middleware' => 'auth',
    'uses' => 'MoviesController@store'
]);

Route::get('/result', [
    'middleware' => 'auth',
    'uses' => 'MoviesController@view'
]);

Route::any('/recommend', [
    'middleware' => 'auth',
    'uses' => 'MoviesController@recommend'
])->name('recommend');;

Route::get('/movies/{id}', [
    'middleware' => 'auth',
    'uses' => 'MoviesController@show'
]);

Route::get('/', [
    'middleware' => 'auth',
    'as' => 'pagination',
    'uses' => 'MoviesController@index'
])->name('index');

Route::any('/search', [
    'middleware' => 'auth',
    'uses' => 'MoviesController@search'
]);

Route::any('deleteallhistory/{id}',[
    'middleware' => 'auth',
    'uses' => 'MoviesController@deleteallhistory'
]);

Route::get('ajax-pagination',array('as'=>'pagination','uses'=>'MoviesController@ajaxPagination'));

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
