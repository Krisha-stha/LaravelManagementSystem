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
      $categories = Category::all();
      $products = Product::where('status', 1)
          ->with('category')
          ->latest()
          ->paginate(12);

      return view('user.products.index', compact('products', 'categories'));
    }

    public function show(Product $product)
    {
      return view('user.products.show', compact('product'));
    }
}
