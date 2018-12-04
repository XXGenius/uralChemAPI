<?php

namespace App\Http\Controllers;
use App\PurchaseMethod;
use Illuminate\Http\Request;

use Laravel\Lumen\Routing\Controller as BaseController;

class PurchaseMethodController extends BaseController
{
    public function create(Request $request)
    {
        $name = $request->input('name');
        $purchaseMethod = new PurchaseMethod([
            'name' => $name,
        ]);
        $purchaseMethod->save();
        return response()->json($purchaseMethod);
    }

    public function read()
    {
        $purchaseMethods = PurchaseMethod::all();
        return response()->json($purchaseMethods);
    }

    public function update()
    {}

    public function delete($id)
    {
        $purchaseMethod = PurchaseMethod::find($id)->get();
        $purchaseMethod->delete();
        return response()->json('Removed successfully.');
    }
}
