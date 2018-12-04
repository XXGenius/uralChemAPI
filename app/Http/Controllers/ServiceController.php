<?php

namespace App\Http\Controllers;
use App\Service;
use Illuminate\Http\Request;

use Laravel\Lumen\Routing\Controller as BaseController;

class ServiceController extends BaseController
{
    public function create(Request $request)
    {
        $name = $request->input('name');
        $service = new Service([
            'name' => $name,
        ]);
        $service->save();
        return response()->json($service);
    }

    public function read()
    {
        $services = Service::all();
        return response()->json($services);
    }

    public function update()
    {
    }

    public function delete($id)
    {
        $service = Service::find($id)->get();
        $service->delete();
        return response()->json('Removed successfully.');
    }
}
