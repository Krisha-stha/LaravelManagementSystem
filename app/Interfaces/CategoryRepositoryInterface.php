<?php

namespace App\Interfaces;

interface CategoryRepositoryInterface
{
  public function createCategory($data);
  public function getAll();
  public function findCategory($id);
  public function updateCategory($id, $data);
  public function deleteCategory($id);
}
