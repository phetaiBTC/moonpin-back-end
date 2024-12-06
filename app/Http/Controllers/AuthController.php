<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (!$token = JWTAuth::attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return response()->json(['token' => $token]);
    }
    public function register(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        return response()->json($user, 201);
    }
    public function user(){
        $users= User::all();
        return response()->json($users);
    }
    public function getuser($id){
        $user= User::find($id);
        return response()->json($user);
    }
    public function delecteuser($id){
        $user= User::find($id);
        $user->delete();
        return response()->json(['message' => 'User deleted successfully']);
    }
    public function updateuser(Request $request, $id){
        $user= User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        return response()->json($user);
    }
    public function edituser($id){
        $user= User::find($id);
        return response()->json($user);
    }
}
