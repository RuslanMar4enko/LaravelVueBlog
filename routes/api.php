<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('/login', 'JwtAuthController@login');

Route::post('/refresh', 'JwtAuthController@refresh');


Route::group(['middleware' => 'jwt.auth'], function () {

  //User
  Route::get('/login/user', 'JwtAuthController@getUser');
  Route::get('/logout', 'JwtAuthController@logout');
  Route::post('/register', 'JwtAuthController@register');

});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'jwt.auth'], function () {

  //Articles
  Route::get('/articles', 'ArticleController@getArticles');
  Route::post('/articles/create', 'ArticleController@postArticle');

  //Language
  Route::get('/languages', 'LanguageController@index');
  Route::get('/languages/{id}', 'LanguageController@show');
  Route::post('/language', 'LanguageController@saveLang');
  Route::put('/language/{id}', 'LanguageController@editLang');
  Route::delete('/language/{id}', 'LanguageController@deleteLang');


  // Categories
  Route::get('/categories', 'CategoryController@index');
  Route::get('/categories/{category}', 'CategoryController@show');
  Route::get('/nested/category', 'CategoryController@nestedSetGetCategory');
  Route::get('/nested/category/select', 'CategoryController@getSelectNested');
  Route::post('/category/create', 'CategoryController@create');
  Route::delete('/category/delete/{id}', 'CategoryController@delete');
  Route::put('/category/update/{category}', 'CategoryController@update');

  //Colors
  Route::resource('colors', 'ColorController', ['except' => [
    'edit', 'create'
  ]]);

  //Product
  Route::resource('products', 'ProductController', ['except' => [
    'edit', 'create'
  ]]);

});
