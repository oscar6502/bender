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

Route::redirect('/', '/dash');
Route::get('/dash', 'DashboardController@index')->name('dash')->middleware('auth');


Route::resource('articles', 'ArticleController')->middleware('auth');
Route::get('/approve', 'ArticleController@approve')->name('approve')->middleware('auth');
Route::get('/search', 'ArticleController@index')->name('search')->middleware('auth');
Route::put('/articles/{article}/check', 'ArticleController@check')->name('check')->middleware('auth');

Auth::routes();

