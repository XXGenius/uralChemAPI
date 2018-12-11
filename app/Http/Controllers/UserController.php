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
        }else if($user && !(Hash::check($password, $user->password))){
            return response()->json(['message' => "Неверный пароль"], 404);
        }
        return response()->json(['message' => "Такого пользователя не существует"], 404);
    }

    public function create(Request $request)
    {
        $firstName = $request->input('firstName');
        $lastName = $request->input('lastName');
        $email = $request->input('email');
        $password = $request->input('password');
        $authToken = md5(microtime());
        $user = new User([
            'email' => $email,
            'firstName' => $firstName,
            'lastName' => $lastName,
            'password' =>  Hash::make($password),
            'authToken' => $authToken
        ]);
        $user->save();
        return response()->json(['result' => 'success', 'auth' => $authToken]);
    }

    public function read()
    {
        $users = User::all('id',  'firstName', 'lastName', 'email');
        return response()->json($users);
    }

    public function update()
    {
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return response()->json('Removed successfully.');
    }
}
