<?php

namespace App\Repositories;

use App\Interfaces\CartRepositoryInterface;
use App\Models\Product;

class CartRepository implements CartRepositoryInterface
{
  public function addProduct($id)
  {
    $product = Product::findOrFail($id);
    $cart = session()->get('cart', []);

    $cart[$id] = [
      'id' => $product->id,
      'name' => $product->name,
      'price' => $product->price,
      'quantity' => isset($cart[$id]) ? $cart[$id]['quantity'] + 1 : 1,
      'image' => $product->image
    ];

    session(['cart' => $cart]);
    return $product->name.' added to cart!';
  }

  public function getCart()
  {
    return session()->get('cart', []);
  }

  public function increaseQuantity($id)
  {
    $cart = session()->get('cart', []);
    if(isset($cart[$id])) {
        $cart[$id]['quantity']++;
    }
    session(['cart' => $cart]);
  }

  public function decreaseQuantity($id)
  {
    $cart = session()->get('cart', []);
    if(isset($cart[$id]) && $cart[$id]['quantity'] > 1) {
        $cart[$id]['quantity']--;
    }
    session(['cart' => $cart]);
  }

  public function removeProduct($id)
  {
    $cart = session()->get('cart', []);
    if(isset($cart[$id])) {
      unset($cart[$id]);
    }
    session(['cart' => $cart]);
  }
}
