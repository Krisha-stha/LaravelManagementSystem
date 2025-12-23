<?php

namespace App\Interfaces;

interface CartRepositoryInterface
{
  public function addProduct($id);
  public function getCart();
  public function increaseQuantity($id);
  public function decreaseQuantity($id);
  public function removeProduct($id);
}
