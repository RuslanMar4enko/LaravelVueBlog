<?php

namespace App\Helpers;


class CRUD
{

    public function index($model, $pageSize = 10)
    {
        try {
            return response()->json($model->latest()->paginate($pageSize));
        } catch (\Exception $exception) {
            return response()->json($exception->getMessage(), 422);
        }

    }


    public function store($model, $request)
    {
        try {
            return $model->create($request->all());

        } catch (\Exception $exception) {
            return response()->json($exception->getMessage(), 422);
        }
    }


    public function update($model, $request = null, $id)
    {
        try {
            $data = $this->show($model, $id);
            return response()->json($data->save($request->all()));

        } catch (\Exception $exception) {
            return response()->json($exception->getMessage(), 406);
        }

    }

    public function show($model, $id)
    {

        try {
            return $this->findOrFail($model, $id);

        } catch (\Exception $exception) {
            return response()->json($exception->getMessage(), 406);
        }

    }

    public function delete($model, $id)
    {
        $model = $this->show($model, $id);
        $model->delete();
    }

}