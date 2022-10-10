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

Route::any('/',['uses'=>'WelcomeController@index']);

Route::resource('article', 'ArticleController' );
Route::get('concept/{concept}',['uses'=>'ArticleController@concept'])->name('concept');
Route::get('article/{article}/link',['uses'=>'ArticleController@link'])->name('link');
Route::put('article/{article}/link',['uses'=>'ArticleController@updateLink'])->name('article.link');

Route::get('article/{article}/pin',['uses'=>'ArticleController@pin'])->name('article.pin');


Route::get('local-image/{path}', ['uses'=>'ImageController@image'])->where('path', '(.*)');;

Route::get('search',['uses'=>'ArticleController@autocomplete'])->name('search');


Route::get('article/{article}/preview',['uses'=>'ArticleController@preview'])->name('article.preview');



Route::get('unlinked',['uses'=>'ArticleController@unlinked'])->name('unlinked');
Route::get('connection/{connection}',['uses'=>'ConnectionController@edit'])->name('connection.edit');
Route::put('connection/{connection}',['uses'=>'ConnectionController@update'])->name('connection.update');
Route::delete('connection/{connection}',['uses'=>'ConnectionController@destroy'])->name('connection.destroy');
