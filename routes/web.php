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

if (config('app.env') === 'production' or config('app.env') === 'staging') {
    // asset()やurl()がhttpsで生成される
    URL::forceScheme('https');
}

Route::get('/', function(){return view('firstpage');});//説明ページ
//Route::get('/','LopsController@index');//説明ページ
Route::get('lops/usershow','LopsController@usershow')->name('lops.usershow');//ユーザー情報編集画面
Route::post('lops/useredit','LopsController@useredit')->name('lops.useredit');//ユーザー編集内容登録
Route::get('lops/detail/{user}','LopsController@detail')->name('lops.detail');//人で検索後に投稿を見る
Route::get('lops/squeeze','LopsController@squeeze')->name('lops.squeeze');//絞り込み検索画面
Route::post('lops/squeeze','LopsController@squeezedo')->name('lops.squeezedo');//絞り込み検索処理
Route::get('lops/cont','LopsController@cont')->name('lops.cont');//自分の投稿表示
Route::post('lops/{lop}/comment','lopsController@comment')->name('lops.comment');//コメントデータベースに登録
Route::resource('lops','LopsController');//基本的な機能

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');//ログイン機能


//ユーザー認証を作成した時に自動的に作成されるルートを下記のように変更
//Auth::routes(['verify' => true]);

