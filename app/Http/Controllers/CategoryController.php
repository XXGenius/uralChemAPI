<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

use Laravel\Lumen\Routing\Controller as BaseController;

class CategoryController extends BaseController
{
    public function create(Request $request)
    {
        $name = $request->input('name');
        $category = new Category([
            'name' => $name,
        ]);
        $category->save();
        return response()->json($category);
    }

    public function read()
    {
        $categories = Category::all();
        return response()->json($categories);
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->name = $request->input('name');
        $category->save();
        return response()->json($category);
    }

    public function delete($id)
    {
        $category = Category::find($id);
        $category->delete();
        return response()->json('Removed successfully.');
    }
}
