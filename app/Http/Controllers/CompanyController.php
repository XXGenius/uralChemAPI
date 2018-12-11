<?php

namespace App\Http\Controllers;
use App\Company;
use Illuminate\Http\Request;

use Laravel\Lumen\Routing\Controller as BaseController;

class CompanyController extends BaseController
{
    public function create(Request $request)
    {
        $name = $request->input('name');
        $company = new Company([
            'name' => $name,
        ]);
        $company->save();
        return response()->json($company);
    }

    public function read()
    {
        $companies = Company::all();
        return response()->json($companies);
    }

    public function update(Request $request, $id)
    {
        $company = Company::find($id);
        $company->name = $request->input('name');
        $company->save();
        return response()->json($company);
    }

    public function delete($id)
    {
        $company = Company::find($id);
        $company->delete();
        return response()->json('Removed successfully.');
    }
}
