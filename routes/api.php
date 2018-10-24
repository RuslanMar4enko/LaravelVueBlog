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


Route::post('/register', 'JwtAuthController@register');
Route::post('/login', 'JwtAuthController@login');
Route::get('/login/token', 'JwtAuthController@getUser');

Route::group(['prefix' => 'v1'], function () {

    Route::get('/articles', 'ArticleController@getArticles');
    Route::post('/articles/create', 'ArticleController@postArticle');

});