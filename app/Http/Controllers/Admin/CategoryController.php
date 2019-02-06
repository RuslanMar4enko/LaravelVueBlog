<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CategoryRequest;
use App\Http\Controllers\Controller;
use App\Facades\CRUD;
use App\Category;

class CategoryController extends Controller
{

  /**
   * @param Category $category
   * @return mixed
   */
  public function index(Category $category)
  {
    return $category->select('id', 'language', 'name', 'parent_id')->paginate(10);
  }

  /**
   * @param Category $category
   * @param CategoryRequest $request
   * @return mixed
   */
  public function create(Category $category, CategoryRequest $request)
  {
    return CRUD::store($category, $request);
  }


  /**
   * @param Category $category
   * @param CategoryRequest $request
   * @param $id
   * @return mixed
   */
  public function update(Category $category, CategoryRequest $request, $id)
  {
    return CRUD::update($category, $request, $id);
  }

  /**
   * @param Category $category
   * @param $id
   * @return mixed
   */
  public function delete(Category $category, $id)
  {
    return CRUD::delete($category, $id);
  }

  /**
   * @param Category $category
   * @return mixed
   */
  public function nestedSetGetCategory(Category $category)
  {
    return $category->getNestedFromCategory()->toTree();
  }

  /**
   * @param Category $category
   * @return mixed
   */
  public function getSelectNested(Category $category)
  {
    return $category->getSelectNested()->toTree();
  }

}
