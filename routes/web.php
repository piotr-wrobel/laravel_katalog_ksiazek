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

use Illuminate\Support\Facades\Route;

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
Route::post('books/store',[
    'uses' => 'BooksController@store',
    'as' => 'books.store'
]);

Route::delete('books/{book}',[
    'uses' => 'BooksController@destroy',
    'as' => 'books.delete'
]);

Route::get('books/edit/{book}',[
    'uses' => 'BooksController@edit',
    'as' => 'books.edit'
]);

Route::put('books/{book}',[
    'uses' => 'BooksController@update',
    'as' => 'books.update'
]);

Route::get('authors',[
    'uses' => 'AuthorsController@index',
    'as' => 'authors.index'
]);

Route::get('authors/create',[
    'uses' => 'AuthorsController@create',
    'as' => 'authors.create'
]);

Route::post('authors/store',[
    'uses' => 'AuthorsController@store',
    'as' => 'authors.store'
]);

Route::delete('authors/{author}',[
    'uses' => 'AuthorsController@destroy',
    'as' => 'authors.delete'
]);

Route::get('authors/edit/{author}',[
    'uses' => 'AuthorsController@edit',
    'as' => 'authors.edit'
]);

Route::put('authors/{author}',[
    'uses' => 'AuthorsController@update',
    'as' => 'authors.update'
]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
