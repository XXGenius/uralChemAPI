<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Profile;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class BranchController extends BaseController
{


    public function create(Request $request)
    {
        $name = $request->input('name');
        $profile_id = $request->input('profile_id');
        $branch = new Branch([
            'name' => $name,
            'profile_id' => $profile_id,
        ]);
        $branch->save();
        $profile = Profile::find($profile_id)->first();
        return response()->json(['branch' => $branch, 'profile' => $profile->name]);
    }

    public function index()
    {
        $branches = Branch::all();
        return response()->json($branches);
    }

    public function read($profile_id)
    {
        $branch = Branch::where('profile_id', '=', $profile_id)->get();
        $profile = Profile::find($profile_id)->first();
        return response()->json(['branches' => $branch, 'profile' => $profile->name]);
    }

    public function update(Request $request, $id)
    {
        $branch = Branch::find($id);
        $branch->name = $request->input('name');
        $branch->profile_id = $request->input('profile_id');
        $branch->save();
        return response()->json($branch);
    }

    public function delete($id)
    {
        $branch = Branch::find($id);
        $branch->delete();
        return response()->json('Removed successfully.');
    }
}
