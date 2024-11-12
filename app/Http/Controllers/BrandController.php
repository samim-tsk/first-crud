<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::latest('id')->get();
        $categories = Category::select('id','title')->get();
        return view('brands.index', compact('brands','categories'));
    }
    public function list()
    {
        $brands = Brand::latest('id')->get();
        $view=view('brands.list',compact('brands'))->render();

        return response()->json([
            'html' => $view,
            'success' => true
        ]);
        
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'nullable',
            'image' => 'nullable|mimes:jpg,png'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()->all(),
                'success' => false
            ]);
        }

        $brand = new Brand();
        $brand->title       = $request->title;
        $brand->description = $request->description;
        $brand->category_id = $request->category_id;

        if ($request->hasFile('image')) {
            $brand->image_path = $request->file('image')->store('brands', 'public');
        }

        $brand->save();

        return response()->json([
            'message' => 'Brand added successfully.',
            'success' => true
        ]);
    }


    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'nullable'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()->all(),
                'success' => false
            ]);
        }

        $brand = Brand::find($id);

        if (!$brand) {
            return response()->json([
                'message' => "The brand is invalid",
                'success' => false
            ]);
        }

        $brand->title       = $request->title;
        $brand->description = $request->description;
        $brand->category_id = $request->category_id;

        if ($request->hasFile('image')) {
            if ($brand->image_path && file_exists(public_path('storage/' . $brand->image_path))) {
                unlink(public_path('storage/' . $brand->image_path));
            }

            $brand->image_path = $request->file('image')->store('brands', 'public');
        }
        $brand->save();

        return response()->json([
            'message' => 'Brand updated successfully.',
            'success' => true
        ]);
    }

    public function destroy($id)
    {
        $brand = Brand::find($id);

        if (!$brand) {
            return response()->json([
                'message' => 'Brand not found.',
                'success' => false
            ]);
        }

        if ($brand->image_path && file_exists(public_path('storage/' . $brand->image_path))) {
            unlink(public_path('storage/' . $brand->image_path));
        }

        $brand->delete();

        return response()->json([
            'message' => 'Brand deleted successfully.',
            'success' => true
        ]);
    }
}
