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

Route::get('/', 'DashboardController@index')->name('dashboard');

Route::get('file', 'FileController@index')->name('file');
Route::get('file/search', 'FileController@search')->name('file.search');

Route::get('file/{file}', 'FileController@show')->name('file.show');

Route::post('file/{file}/{file_comment?}', 'FileController@comment')->name('file.comment');

Route::post('file_comment/{file_comment}/vote', 'FileController@fileVote')->name('file.comment.vote');

Route::get('file/{file}/download', 'FileController@download')->name('file.download');

require ('partials/auth.php');
require ('partials/admin.php');