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

Route::get('/hello', function() {
  return "hello world
          <br> hi earth";
});

// Route::get('/articles', function() {
//   $article1 = 'Tutorial';
//   $article2 = 'Getting started';
//   return view('articles.articles_list', compact('article1', 'article2'));
// });

// Route::get('/iftest', function() {
//   $var1 = 3;
//   $var2 = 5;
//   return view('iftest', compact('var1','var2'));
// });

// Route::get('/articles', 'ArticlesController@getArticles');

Route::get('/iftest', 'ArticlesController@iftest');
Route::get('/insert', 'ArticlesController@insert');
Route::get('/articles', 'ArticlesController@showArticles');
Route::get('/articles/create', 'ArticlesController@create');
Route::get('/articles/{id}', 'ArticlesController@show');
Route::post('/articles/create', 'ArticlesController@store');
Route::get('/articles/{id}/delete', 'ArticlesController@delete');
Route::post('/setpreference', 'ArticlesController@setPreference');
