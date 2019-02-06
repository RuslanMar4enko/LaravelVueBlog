<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Kalnoy\Nestedset\NodeTrait;

class Category extends Model
{
    use NodeTrait;

    protected $table = 'categories';

    protected $fillable = [
        'name',
        'language',
        '_lft',
        '_rgt',
        'parent_id',
    ];


  public function getNestedFromCategory()
  {
    return $this->select('name as title', 'id', DB::raw('1 as expanded'), '_lft', '_rgt', 'parent_id')->get();
  }

  public function getSelectNested()
  {
    return $this->select('name as label', 'id', '_lft', '_rgt', 'parent_id')->get();
  }


}
