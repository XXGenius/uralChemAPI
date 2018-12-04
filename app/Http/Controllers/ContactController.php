<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

use Laravel\Lumen\Routing\Controller as BaseController;

class ContactController extends BaseController
{

    public function create(Request $request)
    {
        $fullname = $request->input('name');
        $post_id = $request->input('post_id');
        $contact = new Contact([
            'fullname' => $fullname,
            'post_id' => $post_id,
        ]);
        $contact->save();
        return response()->json($contact);
    }

    public function read($id)
    {
        $contact = Contact::find($id)->first();
        return response()->json($contact);
    }

    public function update()
    {
    }

    public function delete($id)
    {
        $contact = Contact::find($id);
        $contact->delete();
        return response()->json('Removed successfully.');
    }
}
