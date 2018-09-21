<?php

namespace App\Http\Controllers;

use App\Facades\CRUD;
use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller
{
    public function getArticles(Article $articles)
    {
       return ['data' => CRUD::index($articles, 5)];
    }

}
