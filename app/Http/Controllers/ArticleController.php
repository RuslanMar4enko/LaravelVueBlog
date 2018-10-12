<?php

namespace App\Http\Controllers;

use App\Facades\CRUD;
use App\Http\Requests\ArticleRequest;
use App\Article;
use App\Http\Requests\ArticleRequestEdit;
use App\Services\ImageServices;

class ArticleController extends Controller
{
    public function getArticles(Article $articles)
    {
       return ['data' => CRUD::index($articles, 5)];
    }


    public function postArticle(Article $articles, ArticleRequest $request, ImageServices $imageServices)
    {
        $imageName = $imageServices->nameImage($request->file('image'));
        $request->image = $imageName;
        return ['data' => CRUD::store($articles, $request)];
    }

    public function editArticle(Article $articles,  ArticleRequestEdit $request, $id, ImageServices $imageServices)
    {
        if($request->file('image')){
            $imageName = $imageServices->nameImage($request->file('image'));
            $request->image = $imageName;
        }else{
            $request->image = CRUD::show($articles, $id)->image;
        }

        return ['data' => CRUD::update($articles, $request, $id)];
    }
}
