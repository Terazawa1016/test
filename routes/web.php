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
Route::delete('/cart/{user_id}/api', 'CartController@api_delete')->name('api.delete.cart');


Route::get('/', function () {
    return view('welcome');
});
Route::get('/test','TestController@index');

/**トップページ----------------------------------------------------------------**/

Route::get('/content', 'ContentController@content')->name('content');

Auth::routes();

// ECサイトページ--------------------------------------------------------
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/rank', 'HomeController@rank')->name('rank');

// 問合せページ----------------------------------------------------------
Route::get('/form', 'FormController@form')->name('form');
Route::post('/receive', 'FormController@receive')->name('receive');

// 商品管理ページ---------------------------------------------------------

Route::get('/tool','ToolController@index')->name('tool');

Route::get('/tool/create', 'ToolController@create')->name('tool.create');

Route::post('/tool/store', 'ToolController@store')->name('tool.store');

Route::post('/tool/update/{item_id}', 'ToolController@update')->name('tool.update');

Route::post('/tool/status/{item_id}', 'ToolController@status')->name('tool.status');

Route::post('/tool/delete/{item_id}', 'ToolController@delete')->name('tool.delete');

// ユーザ管理ページ----------------------------------------------------
Route::get('/user','UserController@index')->name('user.manage');

// カートページ---------------------------------------------------------
Route::post('/click/{item_id}','HomeController@click')->name('click');

Route::get('/cart', 'CartController@index')->name('cart');

Route::post('/cart/delete/{item_id}', 'CartController@delete')->name('cart.delete');

Route::post('/cart/change/{item_id}', 'CartController@change')->name('cart.change');

//購入完了ページ----------------------------------------------------------
Route::get('/finish', 'CartController@finish')->name('finish');

// お気に入り機能---------------------------------------------------------
Route::get('like/{id}','LikeController@store')->name('likes.like');
Route::get('dislike/{id}','LikeController@destroy')->name('likes.dislike');

Route::get('put/{item_id}', 'HomeController@put')->name('put');

