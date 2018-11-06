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
    public function update($model, $request = null, $id)
    {
        try {
            $data = $model->findOrFail($id);
            $data->update($request->all());
            return response()->json($data);

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
    public function delete($model, $id)
    {
        try {
            $model = $this->show($model, $id);
            return ['status' => $model->delete()];

        } catch (\Exception $exception) {
            return response()->json('Error', 406);
        }
    }

}