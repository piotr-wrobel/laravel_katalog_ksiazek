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
    return view('welcome');
});
//Route::resource('books', 'BooksController');
Route::get('books',[
    'uses' => 'BooksController@index',
    'as' => 'books.index'
]);
Route::get('books/create',[
    'uses' => 'BooksController@create',
    'as' => 'books.create'
]);
Route::get('books/search',[
    'uses' => 'BooksController@search',
    'as' => 'books.search'
]);
Route::post('books/show',[
    'uses' => 'BooksController@show',
    'as' => 'books.show'
]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
