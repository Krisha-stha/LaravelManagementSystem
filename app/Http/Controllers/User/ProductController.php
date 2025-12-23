<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
  public function index()
    {
      $categories = Category::where('status', 1)->get(); 
      return view('user.products.index', compact('categories'));
    }

    public function show(Product $product)
    {
      return view('user.products.show', compact('product'));
    }
}
