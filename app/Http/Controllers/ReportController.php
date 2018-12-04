<?php

namespace App\Http\Controllers;

use App\Report;
use Illuminate\Http\Request;

use Laravel\Lumen\Routing\Controller as BaseController;

class ReportController extends BaseController
{
    public function create(Request $request)
    {
        $summary = $request->input('summary');
        $volume = $request->input('volume');
        $satisfied = $request->input('satisfied');
        $comment = $request->input('comment');
        $goal_id = $request->input('goal_id');
        $product_id = $request->input('product_id');
        $purchase_method_id = $request->input('purchase_method_id');
        $supplier_id = $request->input('supplier_id');
        $report = new Report([
            'summary' => $summary,
            'volume' => $volume,
            'satisfied' => $satisfied,
            'comment' => $comment,
            'goal_id' => $goal_id,
            'product_id' => $product_id,
            'purchase_method_id' => $purchase_method_id,
            'supplier_id' => $supplier_id
        ]);
        $report->save();
        return response()->json($report);
    }

    public function read($id)
    {
        $report = Report::find($id)->get();
        return response()->json($report);
    }

    public function update()
    {
    }

    public function delete($id)
    {
        $report = Report::find($id)->get();
        $report->delete();
        return response()->json('Removed successfully.');
    }
}
