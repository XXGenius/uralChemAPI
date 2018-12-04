<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;

use Laravel\Lumen\Routing\Controller as BaseController;

class PhotoController extends BaseController
{
    public function create(Request $request)
    {
        $photo = $request->input('photo');
        $report_id = $request->input('report_id');
        $photo = new Photo([
            'photo' => $photo,
            'report_id' => $report_id,
        ]);
        $photo->save();
        return response()->json($photo);
    }

    public function read($report_id)
    {
        $photos = Photo::where('report_id', '=', $report_id)->get();
        return response()->json($photos);
    }

    public function update()
    {
    }

    public function delete($id)
    {
        $photo = Photo::find($id);
        $photo->delete();
        return response()->json($photo);
    }
}
