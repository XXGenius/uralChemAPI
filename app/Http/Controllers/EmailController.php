<?php

namespace App\Http\Controllers;

use App\Email;
use Illuminate\Http\Request;

use Laravel\Lumen\Routing\Controller as BaseController;

class EmailController extends BaseController
{
    public function create(Request $request)
    {
        $email = $request->input('name');
        $contact_id = $request->input('contact_id');
        $email = new Email([
            'email' => $email,
            'contact_id' => $contact_id,
        ]);
        $email->save();
        return response()->json($email);
    }

    public function read($contact_id)
    {
        $emails = Email::where('contact_id', '=', $contact_id)->get();
        return response()->json($emails);
    }

    public function update()
    {
    }

    public function delete($id)
    {
        $email = Email::find($id);
        $email->delete();
        return response()->json('Removed successfully.');
    }
}
