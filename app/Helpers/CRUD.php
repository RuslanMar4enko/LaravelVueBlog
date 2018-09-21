<?php

namespace App\Helpers;

use App\Services\ImageServices;

class CRUD
{

    public function index($model, $pageSize = 10)
    {

        return response()->json($model->latest()->paginate($pageSize));
    }


    public function store($model, $request, ImageServices $imageServices)
    {
        try {

            if ($request->file('image')) {
                $image = $imageServices->nameImage($request->file('image'));
                $request->image = $image;
            }

            return response()->json($model->create($request->all()));

        } catch (\Exception $exception) {

            return response()->json($exception->getMessage(), 406);

        }

    }


    public function update($model, $request = null, $id)
    {

    }

    public function delete($model, $id)
    {

    }

}