<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Facades\CRUD;
use App\Category;

class CategoryController extends Controller
{
   public function index(Category $category)
   {
       return  CRUD::index($category)->language;
   }

   public function create(){

   }
}
