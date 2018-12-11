<?php

namespace App\Http\Controllers;
use App\Crop;
use Illuminate\Http\Request;

use Laravel\Lumen\Routing\Controller as BaseController;

class CropController extends BaseController
{
    public function create(Request $request)
    {
        $name = $request->input('name');
        $profile_id = $request->input('profile_id');
        $crop = new Crop([
            'name' => $name,
            'profile_id' => $profile_id,
        ]);
        $crop->save();
        return response()->json($crop);
    }

    public function index()
    {
        $crops = Crop::all();
        return response()->json($crops);
    }

    public function read($profile_id)
    {
        $crops = Crop::where('profile_id', '=', $profile_id)->get();
        return response()->json($crops);
    }

    public function update(Request $request, $id)
    {
        $crop = Crop::find($id);
        $crop->name = $request->input('name');
        $crop->profile_id = $request->input('profile_id');
        $crop->save();
        return response()->json($crop);
    }

    public function delete($id)
    {
        $crop = Crop::find($id);
        $crop->delete();
        return response()->json('Removed successfully.');
    }
}
