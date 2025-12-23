<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CartController extends Controller
{
  public function add(Request $request, $id)
  {
    $category = Category::findOrFail($id);

    $cart = session()->get('cart', []);

    if (isset($cart[$id])) {
      $cart[$id]['quantity']++;
    } else {
      $cart[$id] = [
        "id" => $category->id,
        "name" => $category->category_name,
        "image" => $category->image,
        "quantity" => 1
      ];
    }

    session()->put('cart', $cart);

    return back()->with('success', $category->category_name . ' added to cart!');
  }

  public function index()
  {
    $cart = session()->get('cart', []);
    return view('user.cart.index', compact('cart'));
  }

  public function increase($id)
  {
    $cart = session()->get('cart', []);

    if (isset($cart[$id])) {
      $cart[$id]['quantity']++;
      session()->put('cart', $cart);
    }

    return back();
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

    return back();
  }

  public function remove($id)
  {
    $cart = session()->get('cart', []);

    if (isset($cart[$id])) {
      unset($cart[$id]);
      session()->put('cart', $cart);
    }

    return back();
  }
}
