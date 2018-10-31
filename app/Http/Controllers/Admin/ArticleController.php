<?php

namespace App\Http\Controllers\Admin;

use App\Facades\CRUD;
use App\Http\Requests\ArticleRequest;
use App\Article;
use App\Http\Requests\ArticleRequestEdit;
use App\Services\ImageServices;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    /**
     * @param Article $articles
     * @return mixed
     */
    public function getArticles(Article $articles)
    {
       return  CRUD::index($articles, 5);
    }


    public function postArticle(Article $articles, ArticleRequest $request, ImageServices $imageServices)
    {
        $imageName = $imageServices->nameImage($request->file('image'));
        $request->image = $imageName;
        return  CRUD::store($articles, $request);
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
