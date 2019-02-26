<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;

class ProductController extends Controller
{

  /**
   * @param Product $product
   * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
   */
    public function index(Product $product)
    {
      return $product->getProductWithCategory();
    }

}
