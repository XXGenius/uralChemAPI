<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;

use Laravel\Lumen\Routing\Controller as BaseController;

class SupplierController extends BaseController
{
    public function create(Request $request)
    {
        $name = $request->input('name');
        $purchase_method_id = $request->input('purchase_method_id');
        $supplier = new Supplier([
            'name' => $name,
            'purchase_method_id' => $purchase_method_id,
        ]);
        $supplier->save();
        return response()->json($supplier);
    }

    public function index()
    {
        $suppliers = Supplier::all();
        return response()->json($suppliers);
    }

    public function read($purchase_method_id)
    {
        $supplier = Supplier::where('purchase_method_id', '=', $purchase_method_id)->get();
        return response()->json($supplier);
    }

    public function update(Request $request, $id)
    {
        $supplier = Supplier::find($id);
        $supplier->name = $request->input('name');
        $supplier->purchase_method_id = $request->input('purchase_method_id');
        $supplier->save();
        return response()->json($supplier);
    }


    public function delete($id)
    {
        $supplier = Supplier::find($id)->get();
        $supplier->delete();
        return response()->json('Removed successfully.');
    }
}
