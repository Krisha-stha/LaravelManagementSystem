<?php

namespace App\Repositories;

use App\Models\Category;
use App\Interfaces\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface
{
  public function create($data)
  {
    $category = new Category();
    $category->category_name = $data['category_name'];
    $category->description = $data['description'];
    $category->status = $data['status'];
    $category->image = $data['image'] ?? null;
    $category->save();

    return $category;
  }

  public function getAll()
  {
    return Category::all();
  }

  public function findCategory($id)
  {
    return \App\Models\Category::findOrFail($id);
  }


  public function updateCategory($id, $data)
  {
    $category = \App\Models\Category::findOrFail($id);
    $category->category_name = $data['category_name'];
    $category->description = $data['description'];
    $category->status = $data['status'];
    
    if (isset($data['image'])) {
        $category->image = $data['image'];
    }
    
    $category->save();
    return $category;
  }

  public function deleteCategory($id)
  {
    $category = \App\Models\Category::findOrFail($id);
    $category->delete();
  }

  public function createCategory($data)
  {
    $category = new \App\Models\Category();
    $category->category_name = $data['category_name'];
    $category->description = $data['description'];
    $category->status = $data['status'];
    $category->image = $data['image'] ?? null;
    $category->save();
    return $category;
  }

}
