<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Category;
use App\Company;
use App\Crop;
use App\General;
use App\Profile;
use Illuminate\Http\Request;

use Laravel\Lumen\Routing\Controller as BaseController;

class GeneralController extends BaseController
{
    public function create(Request $request)
    {
        $category_id = $request->input('category_id');
        $company_id = $request->input('company_id');
        $profile_id = $request->input('profile_id');
        $crop_id = $request->input('crop_id');
        $branch_id = $request->input('branch_id');
        $general = new General([
            'category_id' => $category_id,
            'company_id' => $company_id,
            'profile_id' => $profile_id,
            'crop_id' => $crop_id,
            'branch_id' => $branch_id
        ]);
        $general->save();
        return response()->json($general);
    }

    public function read($id)
    {
        $general = General::find($id)->first();
        $category = Category::find($general->category_id)->first();
        $company = Company::find($general->company_id)->first();
        $profile = Profile::find($general->profile_id)->first();
        $crop = Crop::find($general->crop_id)->first();
        $branch = Branch::find($general->branch_id)->first();
        return response()->json([
            'category' => $category,
            'company' => $company,
            'profile' => $profile,
            'crop' => $crop,
            'branch' => $branch
        ]);
    }

    public function update()
    {
    }

    public function delete($id)
    {
        $general = General::find($id);
        $general->delete();
        return response()->json($general);
    }
}
