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

Route::get('/', 'LopsController@index');

Route::get('lops/cont','LopsController@cont')->name('lops.cont');//自分の投稿表示
Route::post('lops/{lop}/comment','lopsController@comment')->name('lops.comment');//コメントデータベースに登録

Route::resource('lops','LopsController');//基本的な機能

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');//ログイン機能
