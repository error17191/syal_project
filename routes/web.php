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

Route::get('/', function () {
    return view('index.index');
});
Route::get('test-api', 'ExperimentsController@testApi');
Route::get('home','SearchController@home')->name('main.home');
Route::get('search/suggestions', 'SearchController@suggestions')->name('main.search.suggestions');
Route::get('search/top_suggestions', 'SearchController@topSuggestions')->name('main.search.top_suggestions');
Route::get('results', 'SearchController@results')->name('main.results');
Route::get('result','SearchController@details')->name('main.result');
Route::get('cart','SearchController@cart')->name('main.cart');
Route::post('book','SearchController@book')->name('main.book');
Auth::routes();

