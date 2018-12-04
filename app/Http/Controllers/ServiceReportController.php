<?php

namespace App\Http\Controllers;

use App\Service;
use App\ServiceReport;
use Illuminate\Http\Request;

use Laravel\Lumen\Routing\Controller as BaseController;

class ServiceReportController extends BaseController
{
    public function create(Request $request)
    {
        $service_id = $request->input('service_id');
        $report_id = $request->input('report_id');
        $serviceReport = new ServiceReport([
            'service_id' => $service_id,
            'report_id' => $report_id,
        ]);
        $serviceReport->save();
        return response()->json($serviceReport);
    }

    public function read($report_id)
    {
        $services = Service::where('report_id', '=', $report_id)->get();
        return response()->json($services);
    }

    public function update()
    {
    }

    public function delete($id)
    {
        $serviceReport = ServiceReport::find($id)->get();
        $serviceReport->delete();
        return response()->json('Removed successfully.');
    }
}
