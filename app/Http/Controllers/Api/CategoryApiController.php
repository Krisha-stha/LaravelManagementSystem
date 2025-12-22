<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;

class CategoryApiController extends Controller
{
    // GET /api/categories
    public function index()
    {
        $categories = Category::latest()->paginate(10);

        return response()->json([
            'success' => true,
            'data' => $categories
        ], 200);
    }

    // GET /api/categories/{category}
    public function show(Category $category)
    {
        return response()->json([
            'success' => true,
            'data' => $category
        ], 200);
    }

    // POST /api/categories
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_name' => 'required|string|max:255',
            'description'   => 'nullable|string',
            'status'        => 'nullable|boolean',
            'image'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors'  => $validator->errors()
            ], 422);
        }

        $category = new Category();
        $category->category_name = $request->category_name;
        $category->description = $request->description;
        $category->status = $request->status ?? 1;

        if ($request->hasFile('image')) {
            $category->image = $request->file('image')
                ->store('categories', 'public');
        }

        $category->save();

        return response()->json([
            'success' => true,
            'message' => 'Category created successfully',
            'data'    => $category
        ], 201);
    }

    // PUT /api/categories/{category}
    public function update(Request $request, Category $category)
    {
        $validator = Validator::make($request->all(), [
            'category_name' => 'sometimes|required|string|max:255',
            'description'   => 'nullable|string',
            'status'        => 'nullable|boolean',
            'image'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors'  => $validator->errors()
            ], 422);
        }

        $category->update($request->only([
            'category_name',
            'description',
            'status'
        ]));

        if ($request->hasFile('image')) {
            $category->image = $request->file('image')
                ->store('categories', 'public');
            $category->save();
        }

        return response()->json([
            'success' => true,
            'message' => 'Category updated successfully',
            'data'    => $category
        ], 200);
    }

    // DELETE /api/categories/{category}
    public function destroy(Category $category)
    {
        $category->delete();

        return response()->json([
            'success' => true,
            'message' => 'Category deleted successfully'
        ], 200);
    }
}
