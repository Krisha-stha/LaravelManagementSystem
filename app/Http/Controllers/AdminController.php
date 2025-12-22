<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class AdminController extends Controller
{
  public function addcategory()
  {
    return view('admin.addcategory');
  }

  public function postaddcategory(Request $request){
    $category = new Category();
    $category->category_name=$request->category_name;
    $category->description = $request->description;
    $category->status = $request->status;

    if($request->hasFile('image')){
      $path = $request->file('image')->store('categories', 'public');
      $category->image = $path;
    }

    $category->save();
    return redirect()->back();
  }

  public function viewCategory(){
    $categories = Category::all();
    return view('admin.viewcategory', compact('categories'));
  }

  public function editCategory($id){
    $category = Category::findOrFail($id);
    return view('admin.editcategory', compact('category'));
  }

  public function updateCategory(Request $request, $id){
    $category = Category::findOrFail($id);
    $category->category_name = $request->category_name;
    $category->description = $request->description;
    $category->status = $request->status;

    if($request->hasFile('image')){
        $path = $request->file('image')->store('categories', 'public');
        $category->image = $path;
    }

    $category->save();
    return redirect()->route('admin.viewcategory');
  }

  public function deleteCategory($id){
    $category = Category::findOrFail($id);
    $category->delete();
    return redirect()->route('admin.viewcategory');
  }

}
