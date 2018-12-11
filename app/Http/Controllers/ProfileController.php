<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;

use Laravel\Lumen\Routing\Controller as BaseController;

class ProfileController extends BaseController
{
    public function create(Request $request)
    {
        $name = $request->input('name');
        $profile = new Profile([
            'name' => $name,
        ]);
        $profile->save();
        return response()->json($profile);
    }

    public function read()
    {
        $profiles = Profile::all();
        return response()->json($profiles);
    }

    public function update(Request $request, $id)
    {
        $profile = Profile::find($id);
        $profile->name = $request->input('name');
        $profile->save();
        return response()->json($profile);
    }

    public function delete($id)
    {
        $profile = Profile::find($id);
        $profile->delete();
        return response()->json('Removed successfully.');
    }
}
