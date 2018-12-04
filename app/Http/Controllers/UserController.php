<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Hash;
class UserController extends BaseController
{

    public function authenticate(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $user = User::where('email', $email)->first();
        if($user && Hash::check($password, $user->password)) {
            return response()->json(['authToken' => $user->authToken], 200);
        }
        return response()->json(['message' => "User details incorrect"], 404);
    }

    public function create(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $authToken = md5(microtime());
        $user = new User([
            'email' => $email,
            'password' =>  Hash::make($password),
            'authToken' => $authToken
        ]);
        $user->save();
        return response()->json(['result' => 'success', 'auth' => $authToken]);
    }

    public function update()
    {
    }

    public function delete()
    {
    }
}
