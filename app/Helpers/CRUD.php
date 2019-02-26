<?php

namespace App\Helpers;


class CRUD
{
  /**
   * @param $model
   * @param int $pageSize
   * @return \Illuminate\Http\JsonResponse
   */
  public function index($model, $pageSize = 10)
  {
    try {
      return $model->latest()->paginate($pageSize);
    } catch (\Exception $exception) {
      return response()->json('Error', 422);
    }

  }

  /**
   * @param $model
   * @param $request
   * @return \Illuminate\Http\JsonResponse
   */
  public function store($model, $request)
  {
    try {
      return $model->create($request->all());

    } catch (\Exception $exception) {
      return response()->json('Error', 422);
    }
  }

  /**
   * @param $model
   * @param null $request
   * @param $id
   * @return \Illuminate\Http\JsonResponse
   */
  public function update($model, $request = null, $id = null)
  {
    try {
      if ($id) {
        $model = $model->findOrFail($id);
      }
      $model->update($request->all());
      return response()->json($model);

    } catch (\Exception $exception) {
      return response()->json('Error', 406);
    }

  }

  /**
   * @param $model
   * @param $id
   * @return \Illuminate\Http\JsonResponse
   */
  public function show($model, $id)
  {

    try {
      return $model->findOrFail($id);

    } catch (\Exception $exception) {
      return response()->json('Error', 406);
    }

  }

  /**
   * @param $model
   * @param $id
   * @return \Illuminate\Http\JsonResponse
   */
  public function delete($model, $id = null)
  {
    try {
      if ($id) {
        $model = $this->show($model, $id);
      }
      $model->delete();
      return ['status' => $model];

    } catch (\Exception $exception) {
      return response()->json('Error', 406);
    }
  }

}
