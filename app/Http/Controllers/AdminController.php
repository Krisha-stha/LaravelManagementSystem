<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Repositories\CategoryRepository;
use App\Interfaces\CategoryRepositoryInterface;

class AdminController extends Controller
{
   protected $categoryRepo;

    public function __construct(CategoryRepositoryInterface $categoryRepo)
    {
        $this->categoryRepo = $categoryRepo;
    }

  public function addcategory()
  {
    return view('admin.addcategory');
  }

  public function postaddcategory(Request $request)
  {
    $data = [
      'category_name' => $request->category_name,
      'description' => $request->description,
      'status' => $request->status,
      'image' => $request->hasFile('image') ? $request->file('image')->store('categories', 'public') : null
    ];

    $this->categoryRepo->createCategory($data);

    return redirect()->back();
  }


 public function viewCategory(){
    $categories = $this->categoryRepo->getAll();
    return view('admin.viewcategory', compact('categories'));
  }

  public function editCategory($id)
  {
    $category = $this->categoryRepo->findCategory($id);
    return view('admin.editcategory', compact('category'));
  }

  public function updateCategory(Request $request, $id)
  {
    $data = [
      'category_name' => $request->category_name,
      'description' => $request->description,
      'status' => $request->status,
      'image' => $request->hasFile('image') ? $request->file('image')->store('categories', 'public') : null
    ];

    $this->categoryRepo->updateCategory($id, $data);

    return redirect()->route('admin.viewcategory');
  }


  public function deleteCategory($id)
  {
    $this->categoryRepo->deleteCategory($id);
    return redirect()->route('admin.viewcategory');
  }


}
