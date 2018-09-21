<?php

namespace App\Helpers;

class CRUD
{

    public function index($model, $pageSize = 10){

       return response()->json($model->latest()->paginate($pageSize));
    }


    public function store($model, $request = null)
    {

    }

    public function update($model, $request = null, $id)
    {

    }

    public function delete($model, $id)
    {

    }

}