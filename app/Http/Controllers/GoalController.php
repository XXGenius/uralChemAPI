<?php

namespace App\Http\Controllers;

use App\Goal;
use Illuminate\Http\Request;

use Laravel\Lumen\Routing\Controller as BaseController;

class GoalController extends BaseController
{
    public function create(Request $request)
    {
        $name = $request->input('name');
        $goal = new Goal([
            'name' => $name,
        ]);
        $goal->save();
        return response()->json($goal);
    }

    public function read()
    {
        $goals = Goal::all();
        return response()->json($goals);
    }

    public function update()
    {
    }

    public function delete($id)
    {
        $goal = Goal::find($id);
        $goal->delete();
        return response()->json($goal);
    }
}
