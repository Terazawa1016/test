<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

/**トップページ----------------------------------------------------------------**/

Route::get('/folio', 'FolioController@folio')->name('folio');

Auth::routes();

// ECサイトページ--------------------------------------------------------
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/test','TestController@index');

Route::get('/tool','ToolController@index')->name('tool');

Route::get('/tool/create', 'ToolController@create')->name('tool.create');

Route::post('/tool/store', 'ToolController@store')->name('tool.store');

Route::post('/tool/update/{item_id}', 'ToolController@update')->name('tool.update');

Route::post('/tool/status/{item_id}', 'ToolController@status')->name('tool.status');

Route::post('/tool/delete/{item_id}', 'ToolController@delete')->name('tool.delete');

Route::get('/user','UserController@index')->name('user.manage');

Route::post('/click/{item_id}','HomeController@click')->name('click');

Route::get('/cart', 'CartController@index')->name('cart');

Route::post('/cart/delete/{item_id}', 'CartController@delete')->name('cart.delete');

Route::post('/cart/change/{item_id}', 'CartController@change')->name('cart.change');

//購入完了ページ
Route::get('/finish', 'CartController@finish')->name('finish');

// お気に入り機能
Route::get('like/{id}','LikeController@store')->name('likes.like');
Route::get('dislike{id}','LikeController@destroy')->name('likes.dislike');

Route::get('put/{item_id}', 'HomeController@put')->name('put');

// Newsページ----------------------------------------------------------------

Route::get('/top/{page?}', 'TopController@index')->name('top');

Route::get('/like', 'TopController@like')->name('like');

// トピックを投稿
Route::post('/favorite', 'TopController@favorite')->name('favorite');
Route::post('/favorites', 'TopController@favorites')->name('favorites');

Route::get('/chat', 'ChatController@chat')->name('chat');
Route::post('/chat', 'ChatController@chat')->name('chat');

Route::post('/update', 'ChatController@update')->name('update');

Route::get('/pref', 'TopController@pref')->name('pref');
