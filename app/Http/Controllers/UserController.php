<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Models\User;

class UserController extends Controller
{
    public function getUserData(Request $request)
    {
        $user = JWTAuth::parseToken()->authenticate();
        
        return response()->json(['user' => $user]);
    }

    public function updateUserData(Request $request)
    {
        $user = JWTAuth::parseToken()->authenticate();

        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');

        $user->save();

        return response()->json(['message' => 'User updated successfully', 'user' => $user]);
    }
    
    public function deleteUser(Request $request)
    {
        $user = JWTAuth::parseToken()->authenticate();

        $user->delete();

        return response()->json(['message' => 'User deleted successfully']);
    }
   
}

