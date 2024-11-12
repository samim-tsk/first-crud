<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        return view('categories.index', compact('categories'));
    }

    public function list()
    {
        $categories = Category::latest('id')->get();
        $view = view('categories.list',compact('categories'))->render();

        return response()->json([
            'html'    => $view,
            'success' => true
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'title'       => 'required',
            'description' => 'nullable|string'
        ]);

        if($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()->all(),
                'success' => false
            ]);
        }

        $category = new Category();
        $category->title = $request->title;
        $category->description = $request->description;
        $category->save();
        
        return response()->json([
            'message' => 'Category created successfully.',
            'success' => true
        ]);

    }

    public function edit($id)
    {
        $category = Category::select('id', 'title', 'description')->find($id);
        if (!$category) {
            return response()->json([
                'message' => 'Category not found.',
                'success' => false
            ]);
        }
        return response()->json($category);
    }

    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'title'       => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(
                [
                    'message' => $validator->errors()->all(),
                    'success' => false
                ]
            );
        }
        $category = Category::find($id);

        if (!$category) {
            return response()->json([
                'message' => 'Category not found.',
                'success' => false
            ]);
        }

        $category->title       = $request->title;
        $category->description = $request->description;
        $category->save();

        return response()->json([
            'message' => 'Category updated successfully.',
            'success' => true
        ]);
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        if (!$category) {
            return response()->json([
                'message' => 'Category not found.',
                'success' => false
            ]);
        }

        $category->delete();

        return response()->json([
            'message' => 'Category deleted successfully.',
            'success' => true
        ]);
    }
}
