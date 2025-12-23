<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CartController extends Controller
{
  public function index()
  {
    return response()->json([
        'cart' => session()->get('cart', [])
    ]);
  }

  public function add($id)
  {
    $category = Category::findOrFail($id);
    $cart = session()->get('cart', []);

    if (isset($cart[$id])) {
        $cart[$id]['quantity']++;
    } else {
        $cart[$id] = [
            'id' => $category->id,
            'name' => $category->category_name,
            'image' => $category->image,
            'quantity' => 1
        ];
    }

    session()->put('cart', $cart);

    return response()->json([
        'message' => 'Added to cart',
        'cart' => $cart
    ]);
  }

  public function increase($id)
  {
    $cart = session()->get('cart', []);
    if (isset($cart[$id])) {
      $cart[$id]['quantity']++;
      session()->put('cart', $cart);
    }

    return response()->json($cart);
  }

  public function decrease($id)
  {
    $cart = session()->get('cart', []);
    if (isset($cart[$id])) {
      $cart[$id]['quantity']--;
      if ($cart[$id]['quantity'] <= 0) {
        unset($cart[$id]);
      }
      session()->put('cart', $cart);
    }

    return response()->json($cart);
  }

  public function destroy($id)
  {
    $cart = session()->get('cart', []);
    unset($cart[$id]);
    session()->put('cart', $cart);

    return response()->json([
      'message' => 'Item removed',
      'cart' => $cart
    ]);
  }
}
