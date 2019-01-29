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
    Route::post('/language', 'LanguageController@saveLang');
    Route::put('/language/{id}', 'LanguageController@editLang');
    Route::delete('/language/{id}', 'LanguageController@deleteLang');

    // Categories
    Route::get('/categories', 'Admin\LanguageController@getLanguageAndCategory');

});
