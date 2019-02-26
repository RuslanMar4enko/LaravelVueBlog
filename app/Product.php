<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

  protected $table = "products";

  protected $fillable = [

    "id",
    "name",
    "category_id",
    "code",
    "price",
    "old-price",
    "availability",
    "brand",
    "description",
    "views",
    "is_new",

  ];

  public function category()
  {
    return $this->belongsTo(Category::class);
  }

  public function getProductWithCategory()
  {
    return $this->with(['category' => function ($query) {
      $query->select('id', 'name');
    }])->select('name', 'id', 'category_id', 'code', 'price', 'old-price',
      'availability', 'brand', 'description', 'image', 'is_new', 'language')->paginate(10);
  }

}
