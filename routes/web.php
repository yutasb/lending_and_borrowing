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

use App\Http\Controllers\KashikariController;
use App\Http\Controllers\LikesController;

Auth::routes();
//認証機能に関するrootはこれにまとめられている。
Route::get('/home', 'kashikariController@index')->name('kashikari');
Route::get('/', function () {
    return view('welcome');
});

Route::get('/lent/new', 'KashikariController@new')->name('kashikari.new');
Route::post('/lent/new', 'KashikariController@create');
// 新規作成
Route::get('/lent', 'KashikariController@index')->name('kashikari');
// 一覧表示
Route::get('/lent/category/{id}', 'SearchController@categorysearch')->name('kashikari.categorysearch');
//カテゴリ検索
Route::get('/lent/method/{id}', 'SearchController@methodsearch')->name('kashikari.methodsearch');
//渡す方法検索
Route::get('/lent/search/title={title}', 'SearchController@wordsearch')->name('kashikari.wordsearch');
//ワード検索
Route::get('/lent/{id}', 'KashikariController@show')->name('kashikari.show');
// 投稿詳細表示
Route::post('/lent/{id}', 'KashikariController@sendmsg')->middleware('check');
//公開掲示板
Route::get('/lent/{id}/edit', 'KashikariController@edit')->name('kashikari.edit');
Route::post('/lent/{id}/edit', 'KashikariController@update')->name('kashikari.update');
// 投稿編集
Route::post('/lent/{id}/delete', 'KashikariController@delete')->name('kashikari.delete');
// 投稿削除
Route::get('/mypage', 'KashikariController@mypage')->name('kashikari.mypage')->middleware('check');
// マイページ表示
Route::get('/lent/return/{id}', 'LentReturnController@confirm')->name('return.confirm');
Route::post('mypage', 'LentReturnController@return')->name('return.return');
//返却完了→再貸出
Route::get('/users/{id}/edit', 'KashikariController@myprofedit')->name('kashikari.myprofedit');
Route::post('users/{id}/edit', 'KashikariController@myprofupdate')->name('kashikari.myprofupdate');
// プロフィール編集
Route::get('/users/{id}', 'KashikariController@otherprofile')->name('kashikari.otherprofile');
//他ユーザーのプロフィール表示
Route::get('/lent/borrow/{id}', 'ChatController@confirm')->name('chat.confirm')->middleware('check');
Route::get('/msg/{id}', 'ChatController@index')->name('chat.index');
Route::post('/msg/{id}', 'ChatController@send');
//プライベートチャット
Route::post('lent/{id}/like', 'LikesController@off')->name('like.off')->middleware('check');
//気になる
