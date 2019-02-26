<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ColorsRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Facades\CRUD;
use App\Color;

class ColorController extends Controller
{
  /**
   * @param Color $color
   * @return mixed
   */
  public function index(Color $color)
  {
      return  CRUD::index($color, 10);
  }

  /**
   * @param Color $color
   * @param ColorsRequest $request
   * @return mixed
   */
  public function store(Color $color, ColorsRequest $request)
  {
    return CRUD::store($color, $request);
  }

  /**
   * @param Color $color
   * @return mixed
   */
  public function show(Color $color)
  {
    return $color;
  }

  /**
   * @param Color $color
   * @param ColorsRequest $request
   * @param $id
   * @return mixed
   */
  public function update(Color $color, ColorsRequest $request)
  {
    return CRUD::update($color, $request);
  }

  /**
   * @param Color $color
   * @param $id
   * @return mixed
   */
  public function destroy(Color $color, $id)
  {
    return CRUD::delete($color, $id);
  }

}
