<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Contact;
use App\General;
use App\Questionnaire;
use App\Report;
use Illuminate\Http\Request;

use Laravel\Lumen\Routing\Controller as BaseController;

class QuestionnaireController extends BaseController
{

    //'client', 'area', 'address', 'parent_company', 'user_id', 'contact_id', 'general_id', 'report_id'
    public function create(Request $request)
    {
        $client = $request->input('client');
        $area = $request->input('area');
        $address = $request->input('address');
        $parent_company = $request->input('parent_company');
        $contact_id = $request->input('contact_id');
        $general_id = $request->input('general_id');
        $report_id = $request->input('report_id');
        $user_id = $request->input('user_id');
        $branch_id = $request->input('branch_id');
        $questionnaire = new Questionnaire([
            'client' => $client,
            'area' => $area,
            'address' => $address,
            'parent_company' => $parent_company,
            'contact_id' => $contact_id,
            'general_id' => $general_id,
            'report_id' => $report_id,
            'user_id' => $user_id,
            'branch_id' => $branch_id
        ]);
        $questionnaire->save();
        return response()->json($questionnaire);
    }

    public function read($user_id)
    {
        $q = Questionnaire::where('user_id', '=', $user_id)->first();
        $contact = Contact::find($q->contact_id)->first();
        $general = General::find($q->general_id)->first();
        $report = Report::find($q->report_id)->first();
        $branch = Branch::find($q->branch_id)->first();
        return response()->json([
            'client' => $q->client,
            'area' => $q->area,
            'address' => $q->address,
            'parent_company' => $q->parent_company,
            'contact' => $contact,
            'general' => $general,
            'report' => $report,
            'branch' => $branch
        ]);
    }

    public function update()
    {
    }

    public function delete($id)
    {
        $questionnaire = Questionnaire::find($id);
        $questionnaire->delete();
        return response()->json('Removed successfully.');
    }
}
