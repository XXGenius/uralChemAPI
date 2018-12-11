<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

use Laravel\Lumen\Routing\Controller as BaseController;

class ProductController extends BaseController
{
    public function create(Request $request)
    {
        $name = $request->input('name');
        $profile_id = $request->input('profile_id');
        $product = new Product([
            'name' => $name,
            'profile_id' => $profile_id,
        ]);
        $product->save();
        return response()->json($product);
    }

    public function index()
    {
        $products = Product::all();
        return response()->json($products);
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->profile_id = $request->input('profile_id');
        $product->save();
        return response()->json($product);
    }

    public function read($profile_id)
    {
        $product = Product::where('profile_id', '=', $profile_id)->get();
        return response()->json($product);
    }

    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();
        return response()->json('Removed successfully.');
    }
}
