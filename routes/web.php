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

Route::get('/', 'LopsController@index');//welcomeページ

Route::get('lops/squeeze','LopsController@squeeze')->name('lops.squeeze');//絞り込み検索画面
Route::post('lops/squeeze','LopsController@squeezedo')->name('lops.squeezedo');//絞り込み検索処理
Route::get('lops/cont','LopsController@cont')->name('lops.cont');//自分の投稿表示
Route::post('lops/{lop}/comment','lopsController@comment')->name('lops.comment');//コメントデータベースに登録
Route::resource('lops','LopsController');//基本的な機能

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');//ログイン機能
