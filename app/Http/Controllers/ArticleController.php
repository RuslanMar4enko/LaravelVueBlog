<?php

namespace App\Http\Controllers;

use App\Facades\CRUD;
use App\Http\Requests\ArticleRequest;
use App\Article;

class ArticleController extends Controller
{
    public function getArticles(Article $articles)
    {
       return ['data' => CRUD::index($articles, 5)];
    }

    public function postArticle(Article $articles, ArticleRequest $request)
    {
        return ['data' => CRUD::store($articles, $request)];
    }
}
