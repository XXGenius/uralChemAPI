<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

use Laravel\Lumen\Routing\Controller as BaseController;

class PostController extends BaseController
{
    public function create(Request $request)
    {
        $name = $request->input('name');
        $post = new Post([
            'name' => $name,
        ]);
        $post->save();
        return response()->json($post);
    }

    public function read()
    {
        $posts = Post::all();
        return response()->json($posts);
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $post->name = $request->input('name');
        $post->save();
        return response()->json($post);
    }

    public function delete($id)
    {
        $post = Post::find($id);
        $post->delete();
        return response()->json('Removed successfully.');
    }
}
