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
        $category->save();
        return redirect()->back();
    }
}
