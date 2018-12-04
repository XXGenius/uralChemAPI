<?php

namespace App\Http\Controllers;

use App\Number;
use Illuminate\Http\Request;

use Laravel\Lumen\Routing\Controller as BaseController;

class NumberController extends BaseController
{
    public function create(Request $request)
    {
        $number = $request->input('number');
        $contact_id = $request->input('contact_id');
        $number = new Number([
            'number' => $number,
            'contact_id' => $contact_id,
        ]);
        $number->save();
        return response()->json($number);
    }

    public function read($contact_id)
    {
        $numbers = Number::where('contact_id', '=', $contact_id)->get();
        return response()->json($numbers);
    }

    public function update()
    {
    }

    public function delete($id)
    {
        $number = Number::find($id);
        $number->delete();
        return response()->json($number);
    }
}
